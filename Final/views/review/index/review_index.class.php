<?php
/**
 * Author: Carley Hotz, Michael Auer
 * Date: 4/21/2021
 * File: review_index.class.php
 * Description: This class defines a method called "display", which displays all reviews.
 */
class ReviewIndex extends ReviewIndexView {

    //the display method accepts an array of review objects and displays them in a grid.

    public function display($reviews) {
        //display page header
        parent::displayHeader("List All Reviews");

        ?>
        <div class="flex-2">
            <h2>Reviews in the Library</h2>
        </div>


        <div class="grid-container reviews-index">
            <?php
            if ($reviews === 0) {
                echo "No review was found.<br><br><br><br><br>";
            } else {
                //display reviews in a grid; six per row
                foreach ($reviews as $i => $review) {

                    $review_id = $review->getId();
                    $user_full_name = $review->getUserFullName();
                    $book_id = $review->getBookId();
                    $review_text = $review->getReviewText();
                    $book_title = $review->getBookTitle();
                    $rating = $review->getRating();

                    echo "<a href='", BASE_URL, "/review/detail/$review_id' class='card'><p><span>$review_text<br><br>$user_full_name reviewed $book_title ($rating/5)<br>" . "</span></p></a>";
                }
            }

            ?>
        </div>

        <span style="float: right">Want to create your own review? <a href="<?= BASE_URL . "/review/createIndex" ?>">Create</a></span>

        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method
}
