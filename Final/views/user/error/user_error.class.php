<?php
/**
 * Author: Jaron Kempson
 * Date: 4/8/21
 * File: user_error.class.php
 * Description:
 */

class UserError extends UserView {

    public function display($message) {

        //display page header
        parent::displayHeader("Error");
        ?>
        <hr>
        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='<?= BASE_URL ?>/www/img/error.jpg' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3> There was an error processing you request. Please try again.</h3>
                    <div style="color: red">
                        <?= urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><hr>
        <a href="<?= BASE_URL ?>/user/loginIndex">Back to Login</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

}