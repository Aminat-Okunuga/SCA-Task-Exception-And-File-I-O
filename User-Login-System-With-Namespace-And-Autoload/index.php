<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SIgn | Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form class="form" action="controller/authenticate-user.php" method="post">
    <fieldset>
        <legend>Sign Up</legend>
        <label for="username">Username:</label>
        <input class="input" type="text" name="username" placeholder="Username...">
        <label>Password:</label>
        <input class="input" type="password" name="password" placeholder="Password...">
        <div class="submit">
            <input type="submit" name="signup" value="SIgn Up">
        </div>
    </fieldset>
</form>
</body>
</html>