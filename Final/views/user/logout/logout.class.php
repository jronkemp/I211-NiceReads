<?php
/**
 * Author: Jaron Kempson
 * Date: 4/9/21
 * File: logout.class.php
 * Description:
 */


class Logout extends UserView{

    // Determines if the logout was a success and errors, or gives a success message
    public function display($success) {

        // If the user was not added to the database successfully, display an error
        if (!$success) {
            //create new error object
            $error = new UserError();
            //error message
            $message = "There was an error logging out";

            //call display function to display error
            $error->display($message);
        }
        else {
            //call the header method defined in the parent class to add the header
            parent::displayHeader('User Login Confirmation');

            //error message to display
            $message = "Your account was logged out successfully";
            ?>
            <p><?php echo $message; ?></p>

            <a href="<?= BASE_URL . "/index.php" ?>">Back to Login</a>
            <?php

            //call the footer method defined in the parent class to add the footer
            parent::displayFooter();
        }
    }
}