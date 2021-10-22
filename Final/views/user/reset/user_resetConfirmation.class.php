<?php
/**
 * Author: Jaron Kempson
 * Date: 4/27/21
 * File: user_resetConfirmation.class.php
 * Description:
 */

Class ResetConfirm extends UserView {
    // Determines if the reset was a success and gives a message relative to it's success
    public function display($result) {

        // If the password was not added to the database successfully, display an error
        if (!$result) {
            //create new error object
            $error = new UserError();
            //error message
            $message = "There was an error resetting your password";

            //call display function to display error
            $error->display($message);
        } else {
            //call the header method defined in the parent class to add the header
            parent::displayHeader('User Reset Password Confirmation');
            ?>
            <p><?php echo $result; ?></p>

            <a href="<?= BASE_URL . "/user/account" ?>">Back User Account</a>
            <?php

            //call the footer method defined in the parent class to add the footer
            parent::displayFooter();
        }


    }
}