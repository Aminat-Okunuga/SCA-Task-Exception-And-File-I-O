<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07-Jul-20
 * Time: 11:53 AM
 */
//session_start();
//include_once 'autoload.php';
?>
<html>
<head>
    <title>User |Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form class="form" action="controller/authenticate.php" method="post">
    <legend>
        <label for="username">Username:</label>
        <input class="input" type="text" name="username" placeholder="Username...">
        <label>Password:</label>
        <input class="input" type="password" name="password" placeholder="Password...">
        <div class="submit">
            <input type="submit" name="login" value="Login">
        </div>
    </legend>
</form>
</body>
</html>
