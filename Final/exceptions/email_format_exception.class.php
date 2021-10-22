<?php
/**
 * Author: Jaron Kempson
 * Date: 4/26/21
 * File: email_format_exception.class.php
 * Description:
 */

Class EmailFormatException extends Exception {

    public function getDetails(){
        return "Incorrect Email Format. Be sure your email follows username@domain.domain";
    }

}