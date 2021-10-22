<?php

/*
 * Author: Jaron Kempson
 * Date: April 07, 2021
 * File: database.class.php
 * Description: the Database class sets the database details.
 * 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'user' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'nicereads_db',
        'tblReview' => 'reviews',
        'tblBook' => 'books',
        'tblUser' => 'users'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                $this->param['host'], $this->param['user'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    /*
     * TODO: create public functions to access database tables
     * Use Lab 10 database.class.php as an building block
    */

    //returns the name of the table that stores books
    public function getBookTable() {
        return $this->param['tblBook'];
    }

    //returns the name of the table that stores users
    public function getUsersTable() {
        return $this->param['tblUser'];
    }

    //returns the name of the table that stores reviews
    public function getReviewTable() {
        return $this->param['tblReview'];
    }


}
