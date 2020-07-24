<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 1:16 AM
 */
session_start();

use Library\Sanitise as Sanitise;
use Library\Validator as Validate;

include_once '../autoload.php';
try {
    if (isset($_POST['login'])) {
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
        } else {
            $user = new \Entity\Users($username, $password);
            if ($user->loginUser()) {
                header("location: ../welcome.php");
            } else {
                header('location: ../login.php');
            }
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}