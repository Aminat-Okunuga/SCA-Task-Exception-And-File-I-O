<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 12:09 AM
 */
include_once 'autoload.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container">
    <div class="wrap-up">
        <div class="wrap-form">
            <span class="title"><h2>Login</h2></span>
            <div class="form">
                <form class="white-background form" action="#" method="post">
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

