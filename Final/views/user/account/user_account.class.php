<?php
/**
 * Author: Jaron Kempson
 * Date: 4/26/21
 * File: user_account.class.php
 * Description:
 */

Class Account extends UserView {

    public function display(){
        //display page header
        parent::displayHeader("User Account");
        ?>

        <h2>User Account</h2>

        <a href="<?= BASE_URL ?>/user/logout">Logout</a><br>
        <a href="<?= BASE_URL ?>/user/reset">Reset Password</a>

        <span style="float: right"><a href="<?= BASE_URL . "/book/index" ?>">Back to Nicereads!</a></span>
        <?php
        parent::displayFooter();
    }
}