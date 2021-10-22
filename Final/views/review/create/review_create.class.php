<?php
/**
 * Author: Carley Hotz, Michael Auer
 * Date: 5/1/2021
 * File: review_create.class.php
 * Description: create new review class
 */

class Create extends ReviewIndexView {

    // Display the create new review view
    public function display($book) {
        //call the header method defined in the parent class to add the header
        parent::displayHeader('Add Your Review');
        ?>
        <h2>Add Your Review</h2>
        <p>Please complete the entire form to review <strong><?= $book->getTitle() ?></strong>. All fields are required.</p>
        <form method="post" action="<?= BASE_URL . "/review/sanitizeReview" ?>" class="user-form">
            <div><input style="display: none" type="text" name="username" required="" placeholder="Username" value="<?= $_COOKIE['user']  ?>"></div>
            <div><input type="text" style="display: none;" name="book_id" value="<?= $book->getId() ?>" required="" placeholder="Book Title"></div>
            <div>
                <label>Rating</label>
                <select name="rating" required placeholder="Your Rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <br><br>
            <div>
                <label>Review</label>
                <textarea name="reviewText" required="" placeholder="Your Review"></textarea>
            </div>
            <div><input type="submit" class="button" value="Submit"></div>
        </form>

        <?php
        //call the footer method defined in the parent class to add the footer
        parent::displayFooter();
    }
}
?>