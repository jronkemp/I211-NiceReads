<?php
/*
 * Author: Michael Auer
 * Date: April 8, 2021
 * Name: book_detail.class.php
 * Description: This class defines a method "display".
 *              The method accepts a Book object and displays the details of the book on the page.
 */

class BookDetail extends BookIndexView {

    public function display($book, $data, $confirm = "") {
        //display page header
        parent::displayHeader("Display Book Details");

        //retrieve book details by calling get methods
        $id = $book->getId();
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $publisherName = $book->getPublisherName();
        $yearPublished = $book->getYearPublished();
        $pageCount = $book->getPageCount();
        $bestSeller = $book->getBestSeller();
        $image = $book->getImageLink();
        ?>
        <div class="flex">
            <div>
                <img width="180px" src='<?= $image ?>'>
            </div>
            <div class="book-info">
                <h1>
                    <?= $title; ?>
                    <?= $bestSeller == 1 ? '<span class="best-seller">Best Seller</span>' : ''; ?>
                </h1>
                <p>Written by <?= $author ?>, published by <?= $publisherName ?></p>
                <p><strong>Year Published:</strong> <?= $yearPublished ?></p>
                <p><strong>Pages:</strong> <?= $pageCount ?></p>
                <div>
                    <a class="primary-button" href="<?= BASE_URL ?>/review/createIndex/<?= $id ?>">Add review</a>
                </div>
                <hr>
                <div>
                    <h2><?= count($data[0]) ?> Review<?= count($data[0]) !== 1 ? "s" : "" ?></h2>
                    <?php
                    // Display Reviews
                    $reviews = $data[0];
                    $users = $data[1];

                    foreach ($reviews as $review) {
                        // get the username associated with the review
                        $review_username = "";
                        foreach ($users as $user) {
                            if ($user->getId() == $review->getId()) {
                                $review_username = $user->getFullname();
                            }
                        }
                        // Check if no match exists, and set to 'deleted user'
                        if ($review_username == "") {
                            $review_username = "A Deleted User";
                        }

                        // Set Review date
                        $review_date = new DateTime($review->getDateReviewed());

                        ?>
                        <div class="bookdetails-review">
                            <div><strong><?= $review_username ?></strong> rated it <?= $review->getRating() ?>/5</div>
                            <div><?= $review_date->format('m-d-Y'); ?></div>
                            <p><?= $review->getReviewText(); ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <a href="<?= BASE_URL ?>/book/index">Go to book list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
