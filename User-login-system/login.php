<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 07-Jul-20
 * Time: 11:53 AM
 */
include_once 'autoload.php';
?>
<html>
<head>
    <title>User | Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form class="form" action="authenticate.php" method="post">
    <legend>
        <label for="username">Username:</label>
        <input class="input" type="text" name="username" placeholder="Username...">
        <label>Password:</label>
        <input class="input" type="password" name="password" placeholder="Password...">
        <input type="submit" name="submit" value="Sign Up">

    </legend>
</form>
</body>
</html>
