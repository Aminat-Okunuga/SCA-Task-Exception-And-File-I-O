<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 07-Jul-20
 * Time: 11:55 AM
 */

namespace model;
//include_once '../autoload.php';
class Users
{
    //Properties
    public $username;
    public $password;
    public $connection;
    public $isvalid;

    public $usernameValid = false;
    public $passwordValid = false;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $this->isvalid;
        $this->validate();
    }

    private function validate()
    {
        $this->validateUsername();
        $this->validatePassword();
    }

    public function validateUsername()
    {
        try {
            if ($this->username == "") {
                throw new \Exception("You must enter a username");
            }
            if (!strlen($this->username) > 5) {
                throw new \Exception("Username must ne longer than 5 characters");
            }

            $uppercase = preg_match('@[A-Z]@', $this->username);
            $lowercase = preg_match('@[a-z]@', $this->username);
            $number = preg_match('@[0-9]@', $this->username);

            if (!$uppercase || !$lowercase || !$number || strlen($this->username) < 5) {
                throw new \Exception("Username must contain at least 1 uppercase and lowercase and must be longer than 5");
            }
            $this->usernameValid = true;

        } catch (\Exception $ex) {
            echo $ex->getMessage() . "<br>";
        }
    }

    public function validatePassword()
    {
        try {
            if ($this->password == "") {
                throw new \Exception("You must enter a password");
            }
            if (!strlen($this->password) > 9) {
                throw new \Exception("Password must ne longer than 5 characters");
            }

            $uppercase = preg_match('@[A-Z]@', $this->password);
            $lowercase = preg_match('@[a-z]@', $this->password);
            $number = preg_match('@[0-9]@', $this->password);

            if (!$uppercase || !$lowercase || !$number || strlen($this->password) < 9) {
                throw new \Exception("Password must contain at least 1 uppercase and lowercase and must be longer than 5");
            }
            $this->paaswordValid = true;

        } catch (\Exception $ex) {
            echo $ex->getMessage() . "<br>";
        }
    }

//    Method to insert user record
    public function userSignUp()
    {
        try {
            $insert_user = "INSERT INTO user (username, password) VALUES({$this->username}, {$this->password})";
            $query = mysqli_query($this->connection, $insert_user);
            return true;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function userLogin()
    {
        try {
            $sql = "SELECT * FROM user WHERE username = $this->username AND password = $this->password";
            $query = mysqli_query($this->connection, $sql);
            if (mysqli_num_rows($query) > 0) {
                $result = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $result[] = $row;
                }
            } else {
                $result = "";
            }
            return $result;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
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