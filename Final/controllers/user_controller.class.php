<?php
/**
 * Author: Jaron Kempson
 * Date: 4/8/21
 * File: user_controller.class.php
 * Description:
 */

Class UserController {

    //attributes
    private $user_model;

    //constructor
    public function __construct(){

        //user model object
        $this->user_model = new UserModel();
    }

    public function loginIndex(){
        $view = new Login();
        $view->display();
    }

    public function registerIndex(){
        $view = new Register();
        $view->display();
    }

    public function sanitizeRegistration(){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $emailAddress = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $fullName = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);

        $this->register($username, $fullName, $emailAddress, $password);
    }

    public function sanitizeLogin(){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $this->verify($username, $password);
    }

    //method to register the user by creating a user account and storing the data in the database.
    public function register($username, $fullName, $emailAddress, $password){

        //use function add_user from the usermodel class
        $result = $this->user_model->add_user($username, $fullName, $emailAddress, $password);

        //create new view object
        $view = new RegisterConfirmation();

        //pass method variable so that the display function knows if the action
        //was succesful or not
        $view->display($result);
    }

    //method to verify username and password against a database record
    public function verify($username, $password){

        //use the verify_user method from the usermodel class
        $method = $this->user_model->verify_user($username, $password);

        //handle errors
        if($method === FALSE){
            //message to display
            $message = "There was an error logging the user in.";

            $this->error($message);
            return;
        }

        //create new view object
        $view = new BookController();

        //pass method variable so that the display function knows if the action
        //was successful or not
        $view->index();
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new UserError();

        //display the error page
        $error->display($message);
    }

    //method to log a user out of the system
    public function logout(){

        //use the logout method from the usermodel class
        $method = $this->user_model->logout();

        //create new view object
        $view = new Logout();

        //pass method variable so that the display function knows if the action
        //was succesful or not
        $view->display($method);

    }

    //function to reset user password
    public function reset(){
        if (!isset($_COOKIE['user'])) {  //if the user has not logged in
            $this->error("To reset your password, please log in first.");
        }
        else {
            //if the user has logged in.
            $user = $_COOKIE['user'];
            $view = new Reset();
            $view->display($user);
        }
    }

    //completes the database update for the user password reset
    public function doReset(){

        //get the form information
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $result = $this->user_model->reset_password($username, $password);

        $view = new ResetConfirm();
        $view->display($result);

    }

    //account to display user info and provide specific user functions
    public function account(){

        $view = new Account();
        $view->display();
    }

}