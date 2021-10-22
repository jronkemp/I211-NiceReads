<?php
/**
 * Author: Jaron Kempson
 * Date: 4/7/21
 * File: user_model.class.php
 * Description: This class contains four methods to add users, verify users, logout users, and reset passwords
 */

class UserModel {

    //class attributes
    private $db;
    private $dbConnection;

    //constructor
    public function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
    }

    // Adds a user to the database
    public function add_user($username, $fullName, $emailAddress, $password){

        try {
            if (empty($username) || empty($fullName) || empty($emailAddress) || empty($password)) {
                throw new DataMissingException("All Fields Required. Please Complete All Fields.");
            }
            if (Utilities::checkemail($emailAddress) == FALSE) {
                throw new EmailFormatException();
            }
            if (strlen($password) < 5) {
                throw new DataLengthException();
            }
            //hash the users password
            //be sure to hash passwords before they're stored using password_hash()
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO " . $this->db->getUsersTable() . " VALUES( NULL, '$username', '$fullName', NULL, '$emailAddress', '$passwordHash')";

            //run the query and add them to the users table in the usersystem database
            $query = $this->dbConnection->query($sql);

            // True if successful, false if failed
            if (!$query) {
                throw new DatabaseException();
            } else{
                return "Success! <br> $username, your new account has been successfully created. ";
            }
        }

        catch (DataMissingException $e) {
            return $e->getMessage();
        }
        catch (EmailFormatException $e) {
            return $e->getDetails();
        }
        catch (DataLengthException $e) {
            return $e->getDetails();
        }
        catch (DatabaseException $e) {
            return $e->getDetails();
        }
    }

    // Verify if the user is valid and log them in by setting a cookie
    public function verify_user($username, $password){

        //try block to test user input for exceptions
        try {
            if (empty($username) || empty($password)) {
                throw new DataMissingException("All Fields Required. Please Complete All Fields.");
            }
            if (strlen($password) < 5) {
                throw new DataLengthException();
            }
            //sql statement to filter the users table data with a username
            $sql = "SELECT password FROM " . $this->db->getUsersTable() . " WHERE username='$username'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            //verify password; if password is valid, set a temporary cookie
            //otherwise throw exception
            if (!$query) {
                throw new DatabaseException();
            }
            if($query->num_rows > 0){
                $result_row = $query->fetch_assoc();
                $hash = $result_row['password'];
                if (password_verify($password, $hash)) {
                    setcookie("user", $username, time()+31536000,'/');
                    return true;
                }
            }
            else {
                return false;
            }
        }

        catch (DataMissingException $e) {
            return $e->getMessage();
        }
        catch (DataLengthException $e) {
            return $e->getDetails();
        }
        catch (DatabaseException $e) {
            return $e->getDetails();
        }
    }

    // Logout the user
    public function logout(){

        //destroy cookie
        setcookie('username', 0, time() - 3600);

        return true;
    }

    //update the users password
    public function reset_password($username, $password){

        try {

            if(empty($username) || empty($password)){
                throw new DataMissingException("All Fields Required. Please Complete All Fields.");
            }
            if(strlen($password) < 5){
                throw new DataLengthException();
            }
            //make sure it's hashed before it gets updated
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Construct sql statement
            $sql = "UPDATE users SET password = '" . $passwordHash . "' WHERE username = '" . $username . "'";

            //run the sql statement
            $query = $this->dbConnection->query($sql);

            // returns true if succesful query, false if not
            if(!$query){
                throw new DatabaseException();
            }else {
                return "Success! <br> $username, your password has been reset successfully. ";
            }

        }

        catch(DatabaseException $e){
            return $e->getDetails();
        }
        catch(DataLengthException $e){
            return $e->getDetails();
        }
        catch(DataMissingException $e){
            return $e->getMessage();
        }

    }

    // takes username and returns
    public function getIdFromUsername($username) {
        return 1;
    }
}