<?php
///**
// * Created by PhpStorm.
// * User: HP
// * Date: 07-Jul-20
// * Time: 11:55 AM
// */

namespace model;
//include_once '../autoload.php';
//session_start();

class User extends \model\Database
{

//    Properties
    public $db;
    public $username;
    public $password;


    public function __construct()
    {
        $database = new Database();

        $this->db = $database->connectDb();
    }


//    Function to add user
    public function addUser($username, $password)
    {
        try {
            $username = sanitise_input($_POST['username']);
            $password = sanitise_input($_POST['password']);


            if ($username == "" || $password == "") {
                throw new \Exception("Username or Password cannot be empty!");
            } elseif (is_numeric($username)) {
                throw new \Exception("Username cannot be number. Please enter a valid username");
            } else {
                $query = mysqli_query($this->db, "INSERT INTO user (username, password) VALUES('{$username}', '{$password}')");
                header("Location: ../login.php");
                return $query;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

//Function to loginUser
    public function loginUser($username, $password)
    {
        try {
            $username = sanitise_input($_POST['username']);
            $password = sanitise_input($_POST['password']);

            $_SESSION['username'] = $username;

            if ($username == "" || $password == "") {
                throw new \Exception("Username or Password cannot be empty!");
            } elseif (is_numeric($username)) {
                throw new \Exception("Username cannot be number. Please enter a valid username");
            } else {
                $query = mysqli_query($this->db, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}')");
                $result = mysqli_fetch_array($query);
                $count_result = mysqli_num_rows($query);
                if ($count_result > 1) {
                    try {
                        throw new \Exception("Username already exists");
                    } catch (\Exception $ex) {
                        echo $ex->getMessage();
                    }
                } else {
                    return true;
                }
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }


//Getters and Setters

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }
}

?>