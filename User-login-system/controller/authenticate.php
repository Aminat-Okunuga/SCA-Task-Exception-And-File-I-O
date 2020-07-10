<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 07-Jul-20
 * Time: 12:04 PM
 */
session_start();


if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new \model\Users($username, $password);
    if ($user) {
        $user->validateUsername();
        $user->validatePassword();
    } else {
        $user->userSignUp();
        header("Location: login.php");
    }
//    echo "Login Successful!";
    $_SESSION['username'] = $username;
    header("location: login-success.php");
}