<?php

/*
 * Author: Michael Auer, Jaron Kempson
 * Date: April 8, 2021
 * File: book_model.class.php
 * Description: the book model
 * 
 */

class BookModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblBook;
    private $tblReviews;
    private $tblUsers;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getBookModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBook = $this->db->getBookTable();
        $this->tblReviews = $this->db->getReviewTable();
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

    //static method to ensure there is just one BookModel instance
    public static function getBookModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new BookModel();
        }
        return self::$_instance;
    }

    /*
     * the list_book method retrieves all books from the database and
     * returns an array of Book objects if successful or exception if failed.
     */

    public function list_book() {
        try {
            /* construct the sql SELECT statement */

            $sql = "SELECT * FROM " . $this->tblBook;

            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, throw exception
            if (!$query) {
                throw new DatabaseException();
            }

            //if the query succeeded, but no book was found.
            if ($query->num_rows == 0) {
                return 0;
            }

            //handle the result
            //create an array to store all returned books
            $books = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {

                $book = new Book(stripslashes($obj->book_id), stripslashes($obj->title), stripslashes($obj->author), stripslashes($obj->publisherName), stripslashes($obj->yearPublished), stripslashes($obj->pageCount), stripslashes($obj->bestSeller), stripslashes($obj->imageLink));

                //add the book into the array
                $books[] = $book;
            }
            return $books;
        } catch (DatabaseException $e) {
            return $e->getDetails();
        }

    }

    /*
     * the view_book method retrieves the details of the book specified by its id
     * and returns a book object. Return false if failed.
     */

    public function view_book($id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblBook .
                " WHERE " . $this->tblBook . ".book_id='$id'";

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseException();
            }
            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                // Create the book object
                $book = new Book(stripslashes($obj->book_id), stripslashes($obj->title), stripslashes($obj->author), stripslashes($obj->publisherName), stripslashes($obj->yearPublished), stripslashes($obj->pageCount), stripslashes($obj->bestSeller), stripslashes($obj->imageLink));
                return $book;
            }

        } catch (DatabaseException $e) {
            return $e->getDetails();
        }

    }

    // The search book method returns all books that match a set of parameters

    public function search_book($terms) {

        //explode multiple terms into an array
        $terms = explode(" ", $terms);

        //select statement for an AND search
        $sql = $sql = "SELECT * FROM " . $this->tblBook . " WHERE";

        foreach ($terms as $t) {
            $sql .= " title LIKE '%" . $t . "%' AND";
        }

        //removes the extra AND after terms
        $sql = rtrim($sql, " AND");

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // the search failed, return false.
            if (!$query)
                throw new DatabaseException();

            //search succeeded, but no movie was found.
            if ($query->num_rows == 0)
                return 0;

            //search succeeded, and found at least 1 book found.
            //create an array to store all the returned books
            $books = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $book = new Book(stripslashes($obj->book_id), stripslashes($obj->title), stripslashes($obj->author), stripslashes($obj->publisherName), stripslashes($obj->yearPublished), stripslashes($obj->pageCount), stripslashes($obj->bestSeller), "", "");

                //add the book into the array
                $books[] = $book;
            }
            return $books;
        } catch (DatabaseException $e) {
            return $e->getDetails();
        }

    }

    //get all book reviews
    public function get_book_reviews($id) {
        $sql = "SELECT * FROM " . $this->tblReviews . " WHERE " ."$this->tblReviews" . ".book_id='$id'";

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseException();
            }

            //loop through all rows
            $reviews = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {

                $review = new Review(stripslashes($obj->review_id), stripslashes($obj->user_id), stripslashes($obj->book_id), stripslashes($obj->rating), stripslashes($obj->dateReviewed), stripslashes($obj->reviewText));

                //add the book into the array
                $reviews[] = $review;
            }

            // Get users so that we can pull their name
            $sql = "SELECT * FROM " . $this->tblUsers;

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseException();
            }

            $users = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {

                $user = new User(stripslashes($obj->user_id), stripslashes($obj->username), stripslashes($obj->fullName), stripslashes($obj->dateJoined), stripslashes($obj->emailAddress));

                //add the user into the array
                $users[] = $user;
            }

            $data = array($reviews, $users);

            return $data;

        } catch (DatabaseException $e) {
            return $e->getDetails();
        }

    }
}
