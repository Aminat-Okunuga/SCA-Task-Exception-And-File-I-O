<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 1:15 AM
 */
session_start();

use Library\Sanitise as Sanitise;
use Library\Validator as Validate;

include_once '../autoload.php';
//try {
//    $error = "";
//    if ($_SERVER['REQUEST_METHOD'] != "POST") {
//        $_SESSION['error'] = "Invalid request format, please try again";
//    }
//    if (!isset($_POST['register']) && $error == null) {
////        throw new \Exception("Invalid request format, please try again");
//        $_SESSION['error'] = "Invalid request format, please try again";
//    }
//
//    $username = isset($_POST['username']) ? Sanitise:: sanitise($_POST['username']) : null;
//    $password = isset($_POST['password']) ? Sanitise:: sanitise($_POST['password']) : null;
//
//    $usernameError = Validate::validateText('Username', $username);
//     if ($usernameError != null) {
////        throw new \Exception($usernameError);
//        $_SESSION['error'] = $usernameError;
//    }
//    $passwordError = Validate::validateAlphanumeric('Password', $password);
//    if ($passwordError != null) {
////        throw new \Exception($passwordError);
//        $_SESSION['error'] = $passwordError;
//    }
//if($error == "" && $usernameError == "" && $passwordError == ""){
////    echo $_SESSION['error']; exit();
//    $user = new \Entity\Users($username, $password);
////    echo $user->getUsername(); exit();
//    if (!$user->userExist()){
////        echo $user->getUsername(); exit();
//        $user->addUser();
////        if ($user->addUser()) {
////            try {
//////                $_SESSION['error'] = "Check input";
//////            throw new \Exception("Registration successful!");
////                header('location: ../login.php');
////
////            } catch (\Exception $e) {
////                echo $e->getMessage();
////            }
////        } else {
////            header('location: ../index.php');
////        }
//    }else{
//        header("location: ../index.php");
//    }
//
//}
////
//
//} catch (\Exception $e) {
//    echo $e->getMessage();
//}


try {
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        $_SESSION['error'] = "Invalid request format, please try again";
    }
    if (!isset($_POST['register']) && $error == null) {
//        throw new \Exception("Invalid request format, please try again");
        $_SESSION['error'] = "Invalid request format, please try again";
    }
    if (isset($_POST['register'])) {
        $username = isset($_POST['username']) ? Sanitise:: sanitise($_POST['username']) : null;
        $password = isset($_POST['password']) ? Sanitise:: sanitise($_POST['password']) : null;

        $usernameError = Validate::validateText('Username', $username);
        $passwordError = Validate::validateAlphanumeric('Password', $password);
        if ($usernameError != null) {

            $_SESSION['error'] = $usernameError;
        throw new \Exception($usernameError);
        }
        if ($passwordError != null) {

            $_SESSION['error'] = $passwordError;
        throw new \Exception($passwordError);
        }else{
            $user = new \Entity\Users($username, $password);
            if ($user->addUser()){
                header("location: ../login.php");
            }else{
                header('location: ../index.php');
            }
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}