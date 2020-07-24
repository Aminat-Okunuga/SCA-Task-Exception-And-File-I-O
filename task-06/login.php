<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 12:09 AM
 */
session_start();
include_once 'autoload.php';
$error = "";
if(isset($_SESSION['error'])){
    $error =  $_SESSION['error'];

    unset($_SESSION['error']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <div class="wrap-up">
        <div class="wrap-form">
            <span class="title"><h2>Login</h2></span>
            <span style="color: red"><?php echo $error;?></span>
            <div class="form">
                <form class="white-background form" action="Controller/process_login.php" method="post">
                    <div class="input-wrap">
                        <input class="input" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="input-wrap">
                        <input class="input" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="wrap-form-btn">
                        <input class="form-btn" type="submit" name="login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>

