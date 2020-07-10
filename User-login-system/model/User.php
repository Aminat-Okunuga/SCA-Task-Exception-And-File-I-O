<?php
///**
// * Created by PhpStorm.
// * Users: HP
// * Date: 07-Jul-20
// * Time: 11:55 AM
// */
//
////namespace model;
////include_once 'autoload.php';
//class Users
//{
//    //Properties
//    public $username;
//    public $password;
//
//    public $isvalid;
//
//    public $usernameValid = false;
//    public $passwordValid = false;
//
//
//    public function __construct()
//    {
//        $this->isvalid;
//        $this->validate();
//        $database = new Database();
//        $this->conn = $database->connectDB();
//    }
//
////
////    public function __construct()
////    {
////
////    }
//
//    private function validate()
//    {
//        $this->validateUsername();
//        $this->validatePassword();
//    }
//
//    public function validateUsername()
//    {
//        try {
//            if ($this->username == "") {
//                throw new \Exception("You must enter a username");
//            }
//            if (!strlen($this->username) > 5) {
//                throw new \Exception("Username must ne longer than 5 characters");
//            }
//
//            $uppercase = preg_match('@[A-Z]@', $this->username);
//            $lowercase = preg_match('@[a-z]@', $this->username);
//            $number = preg_match('@[0-9]@', $this->username);
//
//            if (!$uppercase || !$lowercase || !$number || strlen($this->username) < 5) {
//                throw new \Exception("Username must contain at least 1 uppercase and lowercase and must be longer than 5");
//            }
//            $this->usernameValid = true;
//
//        } catch (\Exception $ex) {
//            echo $ex->getMessage() . "<br>";
//        }
//    }
//
//    public function validatePassword()
//    {
//        try {
//            if ($this->password == "") {
//                throw new \Exception("You must enter a password");
//            }
//            if (!strlen($this->password) > 9) {
//                throw new \Exception("Password must ne longer than 5 characters");
//            }
//
//            $uppercase = preg_match('@[A-Z]@', $this->password);
//            $lowercase = preg_match('@[a-z]@', $this->password);
//            $number = preg_match('@[0-9]@', $this->password);
//
//            if (!$uppercase || !$lowercase || !$number || strlen($this->password) < 9) {
//                throw new \Exception("Password must contain at least 1 uppercase and lowercase and must be longer than 5");
//            }
//            $this->paaswordValid = true;
//
//        } catch (\Exception $ex) {
//            echo $ex->getMessage() . "<br>";
//        }
//    }
//
////    Method to insert user record
//    public function userSignUp($username, $password)
//    {
//        try {
////            $insert_user = "INSERT INTO user (username, password) VALUES({$this->username}, {$this->password})";
////            $query = mysqli_query($this->connection, $insert_user);
//            $query = mysqli_query($this->conn, "INSERT INTO user (username, password) VALUES ('{$username}', '{$password}')");
//
//            return $query;
//        } catch (\Exception $ex) {
//            echo $ex->getMessage();
//            return false;
//        }
//    }
//
//    public function userLogin($username, $password)
//    {
//        try {
//            $sql = "SELECT * FROM user WHERE username = {$username} AND password = {$password}";
//            $query = mysqli_query($this->conn, $sql);
//            if (mysqli_num_rows($query) > 0) {
//                $result = array();
//                while ($row = mysqli_fetch_assoc($query)) {
//                    $result[] = $row;
//                }
//            } else {
//                $result = "";
//            }
//            return $result;
//        } catch (\Exception $ex) {
//            echo $ex->getMessage();
//        }
//    }
//
//
//    public function getUsername()
//    {
//        return $this->username;
//    }
//
//    public function setUsername($username)
//    {
//        $this->username = $username;
//    }
//
//    public function getPassword()
//    {
//        return $this->password;
//    }
//
//    public function setPassword($password)
//    {
//        $this->password = $password;
//    }
//
//
//}


session_start();
class Users {

    function __construct() {

        // connecting to database
        $db = new Database();
        $this->conn = $db;

    }
    // destructor
    function __destruct() {

    }
    public function userSignup($username, $password){
        $password = md5($password);
        $query = mysqli_query($this->conn, "INSERT INTO users(username, password) values('".$username."','".$password."')") ;
        return $query;

    }
    public function Login($username, $password){
        $res = mysqli_query($this->conn,"SELECT * FROM users WHERE username = '".$username."' AND password = '".md5($password)."'");
        $user_data = mysqli_fetch_array($res);
        //print_r($user_data);
        $no_rows = mysqli_num_rows($res);

        if ($no_rows == 1)
        {

            $_SESSION['login'] = true;
            $_SESSION['uid'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['emailid'];
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function isUserExist($emailid){
        $qr = mysql_query("SELECT * FROM users WHERE emailid = '".$emailid."'");
        echo $row = mysql_num_rows($qr);
        if($row > 0){
            return true;
        } else {
            return false;
        }
    }
}
?>