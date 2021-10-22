<?php
/*
 * Author: Michael Auer
 * Date: April 8, 2021
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */

class IndexView {

    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title> <?php echo $page_title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app.css' />
                <script>
                    //create the JavaScript variable for the base url
                    var base_url = "<?= BASE_URL ?>";
                </script>
            </head>
            <body>
                <nav>
                    <h1 class="flex"><img width="40px" style="margin-right:16px;" src="<?= BASE_URL ?>/www/img/nicereads-logo.png"><span style="padding-top: 4px">Nicereads!</span></h1>
                    <a href="<?= BASE_URL ?>/book/index">Books</a>
                    <a href="<?= BASE_URL ?>/review/index">Reviews</a>
                    <a href="<?= BASE_URL ?>/user/account">User Account</a>
                </nav>
                <main>
                    <?php
                }//end of displayHeader function
                
                //this method displays the page footer
                public static function displayFooter() {
                    ?>
                    </main>
                <footer>&copy 2021 Nicereads. All Rights Reserved.</footer>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    } //end of displayFooter function
}
