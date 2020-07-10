<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form class="form" action="controller/authenticate-user.php" method="post">
    <fieldset>
        <legend>Login</legend>
        <label for="username">Username:</label>
        <input class="input" type="text" name="username" placeholder="Username...">
        <label>Password:</label>
        <input class="input" type="password" name="password" placeholder="Password...">
        <div class="submit">
            <input type="submit" name="login" value="Login">
        </div>
    </fieldset>
</form>
</body>
</html>