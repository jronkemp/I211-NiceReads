<?php
/*
 * Author: Michael Auer, Jaron Kempson
 * Date: April 8, 2021
 * Name: book_index.class.php
 * Description: This class defines a method called "display", which displays all books.
 */
class BookIndex extends BookIndexView {
    /*
     * the display method accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($books) {
        //display page header
       parent::displayHeader("List All Books")
	   
        ?>
        <h2>Books</h2>

        <div class="grid-container">
            <?php
            if ($books === 0) {
                echo "No book was found.<br><br><br><br><br>";
            } else {
                //display movies in a grid; six movies per row
                foreach ($books as $i => $book) {
                    $id = $book->getId();
                    $title = $book->getTitle();
                    $author = $book->getAuthor();
                    $image = $book->getImageLink();

                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }
                    echo "<a href='", BASE_URL, "/book/detail/$id' class='card'><div><img width=\"120px\" src='$image'></div><h4>$title</h4><span>By $author</span></h2></a>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($books) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
       
        <?php
        //display page footer
        parent::displayFooter();
		
    } //end of display method
}
