<?php
/**
 * Author: Jaron Kempson
 * Date: 4/8/21
 * File: user_register.class.php
 * Description:
 */

class Register extends UserView{

    // Display the register view
    public function display() {
        //call the header method defined in the parent class to add the header
        parent::displayHeader('Create Nicereads Account');
        ?>
        <h2>Create An Account</h2>
            <p>Please complete the entire form. All fields are required.</p>
            <form method="post" action="<?= BASE_URL . "/user/sanitizeRegistration" ?>" class="user-form">
                <div><input type="text" name="fullName" required="" placeholder="Full Name"></div>
                <div><input type="email" name="email" required="" placeholder="Email"></div>
                <div><input type="text" name="username" required="" placeholder="Username"></div>
                <div><input type="password" name="password" required="" minlength="5" placeholder="Password"></div>
                <div><input type="submit" class="button" value="Register"></div>
            </form>
            <span style="float: left">Already have an account? <a href="<?= BASE_URL . "/user/loginIndex" ?>">Login</a></span>
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::displayFooter();
    }
}
?>