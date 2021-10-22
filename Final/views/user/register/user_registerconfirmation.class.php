<?php
/**
 * Author: Jaron Kempson
 * Date: 4/8/21
 * File: user_registerconfirmation.class.php
 * Description:
 */
class RegisterConfirmation extends UserView {

    // Determines if the registration was a success and errors, or gives a success message
    public function display($result) {

        // If the user was not added to the database successfully, display an error
        if (!$result) {
            //create new error object
            $error = new UserError();
            //error message
            $message = "There was an error creating your account";

            //call display function to display error
            $error->display($message);
        } else {
            //call the header method defined in the parent class to add the header
            parent::displayHeader('User Registration Confirmation');
        ?>
            <p><?php echo $result; ?></p>

        <a href="<?= BASE_URL . "/user/loginIndex" ?>">Back to Login</a>
        <?php

            //call the footer method defined in the parent class to add the footer
            parent::displayFooter();
        }


    }
}