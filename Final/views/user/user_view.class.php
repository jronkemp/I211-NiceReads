<?php
/**
 * Author: Jaron Kempson
 * Date: 4/8/21
 * File: user_view.class.php
 * Description:
 */

class UserView {

    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link rel='shortcut icon' href='<?= BASE_URL ?>/www/img/favicon.ico' type='image/x-icon' />
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app.css' />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <nav>
            <h1 class="flex"><img width="40px" style="margin-right:16px;" src="<?= BASE_URL ?>/www/img/nicereads-logo.png"><span style="padding-top: 4px">Nicereads!</span></h1>
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
