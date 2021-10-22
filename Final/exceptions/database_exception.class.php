<?php
/**
 * Author: Jaron Kempson
 * Date: 4/26/21
 * File: database_exception.class.php
 * Description:
 */

Class DatabaseException extends Exception {

    public function getDetails() {
        return "There was an error connecting to the database";
    }

}