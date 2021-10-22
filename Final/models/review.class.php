<?php
/**
 * Author: Jaron Kempson, Michael Auer
 * Date: 4/7/21
 * File: review.class.php
 * Description:
 */

Class Review {

    //private attributes to define a review
    private $id, $rating, $dateReviewed, $reviewText, $userID, $bookID, $userFullName, $bookTitle, $bookImageLink;

    //constructor to define all attributes when a new class object is created
    public function __construct($id, $userID, $bookID, $rating, $dateReviewed, $reviewText, $userFullName = "", $bookTitle = "", $bookImageLink = "") {
        $this->id = $id;
        $this->rating = $rating;
        $this->dateReviewed = $dateReviewed;
        $this->reviewText = $reviewText;
        $this->userID = $userID;
        $this->bookID = $bookID;
        $this->userFullName = $userFullName;
        $this->bookTitle = $bookTitle;
        $this->bookImageLink = $bookImageLink;
    }


    //getters to retrieve private attribute values

    public function getId()
    {
        return $this->id;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getDateReviewed()
    {
        return $this->dateReviewed;
    }

    public function getReviewText()
    {
        return $this->reviewText;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getBookID()
    {
        return $this->bookID;
    }

    public function getUserFullName(){
        return $this->userFullName;
    }

    public function getBookTitle() {
        return $this->bookTitle;
    }

    public function getBookImageLink() {
        return $this->bookImageLink;
    }

}