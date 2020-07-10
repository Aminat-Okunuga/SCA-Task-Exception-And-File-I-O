<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Jul-20
 * Time: 9:31 AM
 */
session_start();
include_once '../autoload.php';
//include_once '../model/Users.php';

//Check if form submits
if (isset($_POST['signup'])) {
//    $user = new \model\Users();
    $user->validateSignUp();

}

//Check if form submits
if (isset($_POST['login'])) {
    $user = new \model\Users();
    $user->validateLogin();
}

//Function to sanitise form inputs
function sanitise_input($input)
{
    $input = trim($input);      //removes extra spaces, tabs and newline
    $input = stripcslashes($input);     //removes backslashes from inputs
    $input = htmlspecialchars($input);      //convert special character to html entities

    return $input;
}