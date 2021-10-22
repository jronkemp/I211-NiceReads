<?php
/**
 * Author: Jaron Kempson
 * Date: 4/7/21
 * File: book.class.php
 * Description:
 */

Class Book {

    //private attributes to define a user
    private $id, $title, $author, $publisherName, $yearPublished, $pageCount, $bestSeller, $imageLink;

    //constructor to define all attributes when a new class object is created
    public function __construct($id, $title, $author, $publisherName, $yearPublished, $pageCount, $bestSeller, $imageLink)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->publisherName = $publisherName;
        $this->yearPublished = $yearPublished;
        $this->pageCount = $pageCount;
        $this->bestSeller = $bestSeller;
        $this->imageLink = $imageLink;
    }

    //getters to retrieve private attribute values

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPublisherName()
    {
        return $this->publisherName;
    }

    public function getYearPublished()
    {
        return $this->yearPublished;
    }

    public function getPageCount()
    {
        return $this->pageCount;
    }

    public function getBestSeller()
    {
        return $this->bestSeller;
    }

    public function getImageLink()
    {
        return $this->imageLink;
    }

}