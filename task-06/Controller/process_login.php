<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 1:16 AM
 */
use Library\Sanitise as Sanitise;
use Library\Validator as Validate;
include_once '../autoload.php';
try{
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] != "POST"){
        throw new \Exception("Invalid request format, please try again");
    }
    if (!isset($_POST['register']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $username =isset($_POST['username']) ? Sanitise:: sanitise($_POST['username']) : null;
    $password =isset($_POST['password']) ? Sanitise:: sanitise($_POST['password']) : null;

    $usernameError = Validate::validateText('Username', $username);
    if ($usernameError != null) {
        throw new \Exception($usernameError);
    }

    $passwordError = Validate::validateAlphanumeric('Password', $password);
    if ($passwordError != null) {
        throw new \Exception($passwordError);
    }

    $user = new \Entity\Users($username, $password);
    if ($user->addUser()){
        try{
            throw new \Exception("Registration successful!");
            header('location: login.php');

        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
    else{
        header('location: ../.php');
    }
}catch (\Exception $e){
    echo $e->getMessage();
}