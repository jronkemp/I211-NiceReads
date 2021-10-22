<?php
/*
 * Author: Michael Auer
 * Date: April 8, 2021
 * Name: login_index_view.class.php
 * Description: the parent class that displays a search box.
 * The javascript varaiable media specifies the media type. This variable is needed for auto suggestion.
 */

class BookIndexView extends IndexView {

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "book";
        </script>
        <!-- TODO: create and implement the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/book/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search books by title" autocomplete="off" >
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv" style="display: none"></div>
        </div>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}
