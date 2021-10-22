<?php
/*
 * Author: Michael Auer
 * Date: April 28, 2021
 * Name: search.class.php
 * Description: this script defines the SearchMovie class. The class contains a method named display, which
 *     accepts an array of Movie objects and displays them in a grid.
 */

class BookSearch extends BookIndexView {
    /*
     * the displays accepts an array of book objects and displays
     * them in a grid.
     */

     public function display($terms, $books) {
        //display page header
        parent::displayHeader("Search Results");
        ?>

        <hr>

<!--     display search terms used    -->
         <div id="main-header"> Search Results for <i><?= $terms ?></i></div>

       <!-- display all records in a grid -->
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

                           if ($i % 6 == 0) {
                               echo "<div class='row'>";
                           }

                           echo "<a href='", BASE_URL, "/book/detail/$id' class='card'><p><span>$title<br> $author<br>" . "</span></p></a>";
                           ?>
                           <?php
                           if ($i % 6 == 5 || $i == count($books) - 1) {
                               echo "</div>";
                           }
                       }
                   }
                   ?>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
