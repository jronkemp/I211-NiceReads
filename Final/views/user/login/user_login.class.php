<?php
/**
 * Author: Jaron Kempson
 * Date: 4/8/21
 * File: user.class.php
 * Description:
 */

//username: admin
//password: password

class Login extends UserView {

    public function display() {

        //call the header method defined in the parent class to add the header
        parent::displayHeader('User Login');
        ?>
        <!-- page header  -->
        <h2>User Login</h2>

            <!-- login form -->
            <p>Please enter your username and password.</p>
            <form method="post" action="<?= BASE_URL . "/user/sanitizeLogin" ?>" class="user-form">
                <div><input type="text" name="username" required="" placeholder="Username"></div>
                <div><input type="password" name="password" required="" minlength="5" placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>

            <span style="float: right">Don't have an account? <a href="<?= BASE_URL . "/user/registerIndex" ?>">Register</a></span>


        <?php
        //call the footer method defined in the parent class to add the footer
        parent::displayFooter();
    }
}