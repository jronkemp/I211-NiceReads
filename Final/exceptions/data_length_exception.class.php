<?php
/**
 * Author: Jaron Kempson
 * Date: 4/26/21
 * File: data_length_exception.class.php
 * Description:
 */

Class DataLengthException extends Exception {

    public function getDetails(){
        return "Password must be longer than 5 characters.";
    }

}