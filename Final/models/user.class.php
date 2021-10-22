<?php
/**
 * Author: Michael Auer
 * Date: 4/28/21
 * File: user.class.php
 * Description: The class definition for the user
 */

Class User {

    //private attributes to define a user
    private $id, $username, $fullName, $dateJoined, $emailAddress;

    /**
     * User constructor.
     * @param $id
     * @param $username
     * @param $fullName
     * @param $dateJoined
     * @param $emailAddress
     */
    public function __construct($id, $username, $fullName, $dateJoined, $emailAddress)
    {
        $this->id = $id;
        $this->username = $username;
        $this->fullName = $fullName;
        $this->dateJoined = $dateJoined;
        $this->emailAddress = $emailAddress;
    }

    // Returns user id
    public function getId()
    {
        return $this->id;
    }

    // Returns username
    public function getUsername()
    {
        return $this->username;
    }

    // returns fullname
    public function getFullName()
    {
        return $this->fullName;
    }

    // Returns date joined
    public function getDateJoined()
    {
        return $this->dateJoined;
    }

    // Returns email address
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }


}