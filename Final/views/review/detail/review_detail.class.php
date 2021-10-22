<?php
/**
 * Author: Carley Hotz, Michael Auer
 * Date: 4/21/2021
 * File: review_detail.class.php
 * Description: This class defines a method "display".
 *              The method accepts a Review object and displays the details of the review on the page.
 */

class ReviewDetail extends ReviewIndexView {

    public function display($review, $confirm = "") {
        //display page header
        parent::displayHeader("Display Review Details");

        //retrieve review details by calling get methods
        $bookImageLink = $review->getBookImageLink();
        $user_name = $review->getUserFullName();
        $book_id = $review->getBookId();
        $rating = $review->getRating();
        $dateReviewed = new DateTime($review->getDateReviewed());
        $reviewText = $review->getReviewText();
        $bookTitle = $review->getBookTitle();
        ?>

        <h1>Review Details</h1>
        <hr>

        <div class="flex">
            <div>
                <img width="180px" src="<?= $bookImageLink ?>">
            </div>
            <div class="book-info">
                <p><?= $user_name ?> reviewed <a href="<?= BASE_URL ?>/book/detail/<?= $book_id ?>"><?= $bookTitle ?></a></p>
                <p><?= $dateReviewed->format('m-d-Y') ?></p>
                <p>Rating: <?= $rating ?>/5</p>
                <hr>
                <p><?= $reviewText ?></p>
            </div>
        </div>

        <a href="<?= BASE_URL ?>/review/index">Go to review list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
