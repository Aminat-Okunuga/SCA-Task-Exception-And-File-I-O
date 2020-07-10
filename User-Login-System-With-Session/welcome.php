<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome | Page</title>
</head>
<body>
<div>
    <h2 style="color: #000000">Welcome <span><?php echo $_SESSION['username']; ?></span> </h2>
</div>
</body>
</html>