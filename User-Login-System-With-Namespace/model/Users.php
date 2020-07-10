<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Jul-20
 * Time: 8:53 AM
 */

namespace model;
session_start();
class Users
{
//    Properties
    public $username;
    public $password;

    function validateLogin()
    {
        try {
            $username = sanitise_input($_POST['username']);
            $password = sanitise_input($_POST['password']);

            $_SESSION['username'] = $username;

            if (empty($username) || empty($password)) {
                throw new \Exception("Username or Password can not be empty");
            } elseif (is_numeric($username) || is_numeric($password)) {
                throw new \Exception("Username or Password cannot be number");
            } else {
                header("Location: ../welcome.php");
            }

        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function validateSignUp()
    {
        try {
            $username = sanitise_input($_POST['username']);
            $password = sanitise_input($_POST['password']);

            if (empty($username) || empty($password)) {
                throw new \Exception("Username or Password can not be empty");
            } elseif (is_numeric($username) || is_numeric($password)) {
                throw new \Exception("Username or Password cannot be number");
            } else {
                header("Location: ../login.php");
            }

        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function nameExist(){
        try{
            $username = sanitise_input($_POST['username']);
            $password = sanitise_input($_POST['password']);


        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
}