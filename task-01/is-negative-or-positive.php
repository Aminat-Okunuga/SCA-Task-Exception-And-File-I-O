<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 14-Jun-20
 * Time: 7:33 AM
 */

if (isset($_POST['submit'])) {
    //get user's input
    $num = $_POST['number'];


    if ($num > 0) {             //check if positive
        echo "<h2>The number " . $num . " is positive!</h2>";
    } elseif ($num < 0) {       //check if negative
        echo "<h2>The number " . $num . " is negative!</h2>";
    } else {
        echo "<h2>The number " . $num . " is Zero!</h2>";
    }
}
?>

<html>
<head>
    <title>Positive | Negative | Zero Numbers</title>
</head>
<body>
<form action="#" method="post">
    <input type="number" name="number" placeholder="Enter your here...">
    <input type="submit" name="submit" value="Check Number">
</form>
</body>
</html>
