<?php
/**
 * Author: Carley Hotz
 * Date: 5/1/2021
 * File: review_createconfimation.php
 * Description: class for the confirmation of the create review
 */

class CreateConfirmation extends ReviewIndexView {

    // Determines if the review creation had errors or gives a success message
    public function display($result) {

        // If the review was not added to the database successfully, display an error
        if (!$result) {
            //create new error object
            $error = new UserError();
            //error message
            $message = "There was an error creating your review";

            //call display function to display error
            $error->display($message);
        } else {
            //call the header method defined in the parent class to add the header
            parent::displayHeader('Review Success Confirmation');
            ?>
            <p>Your Review was created succesfully.</p>

            <a href="<?= BASE_URL . "/review/index" ?>">Back to Reviews</a>
            <?php

            //call the footer method defined in the parent class to add the footer
            parent::displayFooter();
        }


    }
}