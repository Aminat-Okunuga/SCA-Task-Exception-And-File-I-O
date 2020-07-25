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

try {
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }
    if (!isset($_POST['register']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }
    if (isset($_POST['register'])) {
        $username = isset($_POST['username']) ? Sanitise:: sanitise($_POST['username']) : null;
        $password = isset($_POST['password']) ? Sanitise:: sanitise($_POST['password']) : null;

        $usernameError = Validate::validateText('Username', $username);
        $passwordError = Validate::validateAlphanumeric('Password', $password);
        if ($usernameError != null) {
            throw new \Exception($usernameError);
        }
        if ($passwordError != null) {
            throw new \Exception($passwordError);
        } else {
            $user = new \Entity\Users($username, $password);
            if ($user->addUser()) {
                header("location: ../login.php");
            } else {
                header('location: ../index.php');
            }
        }
    }
} catch (\Exception $e) {
    echo $_SESSION['error'] = $e->getMessage();
    header('location: ../index.php');
}