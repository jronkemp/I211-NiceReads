<?php
/**
 * Author: Carley Hotz, Michael Auer
 * Date: 4/10/2021
 * File: review_controller.class.php
 * Description: review controller
 */

class ReviewController {

    private $review_model, $book_model, $user_model;

    //default constructor
    public function __construct()
    {
        //create an instance of the ReviewModel class
        $this->review_model = ReviewModel::getReviewModel();

        //create an instance of the BookModel class
        $this->book_model = BookModel::getBookModel();

        // Create an instance of user model
        $this->user_model = new UserModel();
    }

    //index action that displays all reviews
    public function index()
    {
        // retrieve all reviews from a database
        $reviews = $this->review_model->list_review();

        if (!$reviews) {
            $message = "There was an error displaying reviews";
            $this->error($message);
            return;
        }

        // List all the reviews
        $view = new ReviewIndex();
        $view->display($reviews);
    }

    //show details of a review
    public function detail($id)
    {
        // retrieve the review
        $review = $this->review_model->view_review($id);

        if (!$review) {
            $message = "There was an error displaying the review";
            $this->error($message);
            return;
        }

        // Display the review
        $view = new ReviewDetail();
        $view->display($review);
    }

    //handle an error
    public function error($message)
    {
        $error = new ReviewError();
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

    public function createIndex($id) {

        // retrieve the book
        $book = $this->book_model->view_book($id);

        if (!$book) {
            $message = "There was an error displaying the book";
            $this->error($message);
            return;
        }

        $view = new Create();
        $view->display($book);
    }

    public function sanitizeReview()
    {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $book_id = filter_var($_POST['book_id'], FILTER_SANITIZE_STRING);
        $rating = filter_var($_POST['rating'], FILTER_SANITIZE_STRING);
        $reviewText = filter_var($_POST['reviewText'], FILTER_SANITIZE_STRING);

        $this->create($username, $book_id, $rating, $reviewText);
    }

    //method to create the review by creating a review and storing the data in the database.
    public function create($username, $book_id, $rating, $reviewText) {

        // Convert username to id
        $user_id = $this->user_model->getIdFromUsername($username);


        // Get current date
        $date = new DateTime();


        //use function add_review from the review model class
        $result = $this->review_model->add_review($user_id, $book_id, $rating, $date, $reviewText);

        //create new view object
        $view = new CreateConfirmation();

        //pass method variable so that the display function knows if the action was successful or not
        $view->display($result);

    }

}