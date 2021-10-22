<?php

/*
 * Author: Michael Auer, Jaron Kempson
 * Date: April 8, 2021
 * File: book_controller.class.php
 * Description: the book controller
 *
 */

class BookController {

    private $book_model;

    //default constructor
    public function __construct() {
        //create an instance of the BookModel class
        $this->book_model = BookModel::getBookModel();
    }

    //index action that displays all books
    public function index() {
        // retrieve all books from a database
        $books = $this->book_model->list_book();

        if (!$books) {
            $message = "There was an error displaying books";
            $this->error($message);
            return;
        }

        // List all the books
        $view = new BookIndex();
        $view->display($books);
    }

    //show details of a book
    public function detail($id) {
        // retrieve the book
        $book = $this->book_model->view_book($id);

        if (!$book) {
            $message = "There was an error displaying the book";
            $this->error($message);
            return;
        }

        // Get book reviews
        $reviews = $this->book_model->get_book_reviews($id);

        // Display the book
        $view = new BookDetail();
        $view->display($book, $reviews);
    }

    //handle an error
    public function error($message) {
        $error = new BookError();
        $error->display($message);
    }

    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all books
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $books = $this->book_model->search_book($query_terms);

        if ($books === false) {
            //handle error
            $message = "There was an error retrieving books from the search";
            $this->error($message);
            return;
        }
        //display matched books
        $search = new BookSearch();
        $search->display($query_terms, $books);
    }

    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $books = $this->book_model->search_book($query_terms);

        //retrieve all book titles and store them in an array
        $titles = array();
        if ($books) {
            foreach ($books as $book) {
                $titles[] = $book->getTitle();
            }
        }

        echo json_encode($titles);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

}
