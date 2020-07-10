<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07-Jul-20
 * Time: 12:04 PM
 */
session_start();
include_once '../autoload.php';


if (isset($_POST['signup'])) {
    $username = sanitise_input($_POST['username']);
    $password = sanitise_input($_POST['password']);

    $user->addUser($username, $password);

}

//login logic
if (isset($_POST['login'])) {
    $username = sanitise_input($_POST['username']);
    $password = sanitise_input($_POST['password']);

    if($user->loginUser($username, $password)){
        header("location: ../welcome.php");
    }

}


function sanitise_input($input){
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}