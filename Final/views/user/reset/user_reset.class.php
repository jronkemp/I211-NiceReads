<?php
/**
 * Author: Jaron Kempson
 * Date: 4/27/21
 * File: user_reset.class.php
 * Description:
 */

Class Reset extends UserView {

    public function display($user) {
        parent::displayHeader("User Reset Password");
        ?>

        <h2>Reset Password</h2>
        <p>Please complete the entire form. All fields are required.</p>
        <form method="post" action="<?= BASE_URL . "/user/doReset" ?>" class="user-form">
            <div><input type="text" name="username" value="<?= $user ?>" readonly="readonly"></div>
            <div><input type="password" name="password" required="" minlength="5" placeholder="Password"></div>
            <div><input type="submit" class="button" value="Register"></div>
        </form>
        <span style="float: left">Cancel Reset Password?<a href="<?= BASE_URL . "/user/account" ?>"> User Account </a></span>

        <?php
        parent::displayFooter();
    }

}