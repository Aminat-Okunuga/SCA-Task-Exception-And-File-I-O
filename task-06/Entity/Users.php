<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 12:08 AM
 */

namespace Entity;
class Users extends \Library\Database
{
    public $username;
    public $password;
    public $db;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $database = new \Library\Database();
        $this->db = $database->connectDb();
    }

    public function addUser()
    {
        try {

            $sql = "INSERT INTO user (username, password) VALUES('$this->username', '$this->password')";
            $query = mysqli_query($this->db, $sql);
            return true;

        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function loginUser()
    {g
        try {
            $sql = "SELECT * FROM user WHERE username = '$this->username' AND password = '$this->password'";
            $result = mysqli_query($this->db, $sql);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] = $this->username;
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function userExist()
    {
        try {
            $query = "SELECT * FROM user WHERE username = '$this->username' AND password = '$this->password'";
            $result = mysqli_query($this->db, $query);
            if (mysqli_num_rows($result) > 0) {
                throw new \Exception("User already exists");
            } else {
                return true;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

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
}