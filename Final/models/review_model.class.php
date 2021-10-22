<?php
/**
 * Author: Carley Hotz, Michael Auer
 * Date: 4/21/2021
 * File: review_model.class.php
 * Description: review model
 */

class ReviewModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblReview;
    private $tblUsers;
    private $tblBooks;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getBookReview method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();

        $this->tblReview = $this->db->getReviewTable();
        $this->tblUsers = $this->db->getUsersTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one ReviewModel instance
    public static function getReviewModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new ReviewModel();
        }
        return self::$_instance;
    }

    /*
     * the list_review method retrieves all reviews from the database and
     * returns an array of Review objects if successful or false if failed.
     */

    public function list_review() {
        /* construct the sql SELECT statement */

        try {

            $sql = "SELECT * FROM reviews INNER JOIN users ON reviews.user_id = users.user_id INNER JOIN books ON reviews.book_id = books.book_id";
//          return $sql;

            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, throw exception
            if (!$query) {
                throw new DatabaseException();
            }

            //if the query succeeded, but no review was found.
            if ($query->num_rows == 0) {
                return 0;
            }

            //handle the result
            //create an array to store all returned reviews
            $reviews = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {

                $review = new Review(stripslashes($obj->review_id), stripslashes($obj->user_id), stripslashes($obj->book_id), stripslashes($obj->rating), stripslashes($obj->dateReviewed), stripslashes($obj->reviewText), stripslashes($obj->fullName), stripslashes($obj->title));

                //add the review into the array
                $reviews[] = $review;
            }
            return $reviews;
        } catch (DatabaseException $e) {
            return $e->getDetails();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /*
     * the view_review method retrieves the details of the review specified by its id
     * and returns a review object. Return false if failed.
     */

    public function view_review($id) {
        //the select sql statement
        $sql = "SELECT * FROM reviews INNER JOIN users ON reviews.user_id = users.user_id INNER JOIN books ON reviews.book_id = books.book_id WHERE reviews.review_id=$id";

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseException();
            }

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                // Create the review object
                $review = new Review(stripslashes($obj->review_id), stripslashes($obj->user_id), stripslashes($obj->book_id), stripslashes($obj->rating), stripslashes($obj->dateReviewed), stripslashes($obj->reviewText), stripslashes($obj->fullName), stripslashes($obj->title), stripslashes($obj->imageLink));
                return $review;
            }

        } catch (DatabaseException $e) {
            return $e->getDetails();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //add a review to the database
    public function add_review($user_id, $book_id, $rating, $date, $reviewText) {


        //add user_id and book_id when figure out how to get from username and title
        $sql = "INSERT INTO reviews VALUES( NULL, $user_id, $book_id, $rating, CURRENT_DATE , '$reviewText')";


        try {
            //run the query and add them to the review table in the usersystem database
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseException();
            }

            return true;
            
        } catch (DatabaseException $e) {
            return $e->getDetails();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}
