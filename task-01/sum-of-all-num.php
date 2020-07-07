<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 14-Jun-20
 * Time: 7:24 AM
 */

//check if form submits
if (isset($_POST['submit'])) {

//get number entered by user
    $num = $_POST['num'];

    //initialize sum to 0
    $sum = 0;
//loop through the numbers
    for ($i = 0; $i <= $n; $i = $i+1) {
        $sum += $i;
    }
    echo "Sum of all numbers between 1 and " . $n . " is: " . $sum;
}
?>

<html>
<head>
    <title>Sum of all numbers</title>
</head>
<body>
<!--Html form to get user input-->
<form method="post" action="#">
    <input type="number" name="num" placeholder="enter any number">
    <button type="submit" name="submit" value="Submit">Submit</button>
</form>
</body>
</html>
