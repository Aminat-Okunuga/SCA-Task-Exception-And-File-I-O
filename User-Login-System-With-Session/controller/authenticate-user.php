<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 09-Jul-20
 * Time: 9:31 AM
 */
session_start();
if (isset($_POST['signup'])) {
    $username = sanitise_input($_POST['username']);
    $password = sanitise_input($_POST['password']);


    if ($username == "" || $password == "") {
        echo "<h2>Username or Password field cannot be empty</h2>";
        header("location: ../index.php");
    } else if (is_numeric($username) || is_numeric($password)) {
        echo "Username or Password cannot be number";
        header("location: ../index.php");
    } else {

    $_SESSION['username'] = $username;
        header("Location: ../login.php");

    }
}


if (isset($_POST['login'])) {
    $username = sanitise_input($_POST['username']);
    $password = sanitise_input($_POST['password']);

    if ($username == "" || $password == "") {
        echo "<h2>Username or Password field cannot be empty</h2>";
        header("location: ../login.php");
    } else if (is_numeric($username) || is_numeric($password)) {
        echo "Username or Password cannot be number";
        header("location: ../login.php");
    } else {
        $_SESSION['username'] = $username;
//        echo  $_SESSION['username'];
////        echo $username;
//        exit();
        header("Location: ../welcome.php");
    }
}

//Function to sanitise form inputs
function sanitise_input($input)
{
    $input = trim($input);      //removes extra spaces, tabs and newline
    $input = stripcslashes($input);     //removes backslashes from inputs
    $input = htmlspecialchars($input);      //convert special character to html entities

    return $input;
}