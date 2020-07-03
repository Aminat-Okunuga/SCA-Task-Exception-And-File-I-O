<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 14-Jun-20
 * Time: 7:10 AM
 */

//check if form submits
if(isset($_POST['submit'])) {
    $num = $_POST['num'];

//get number entered by user
    $n = $_POST['num'];
    $sum = 0;
//loop through the numbers
    for ($i = 2; $i <= $n; $i = $i + 2) {
        $sum += $i;

    }
    echo "Sum of all even numbers between 1 and " . $n . " is: " . $sum;
}
?>

<!--Html form to get user input-->
<form method="post" action="#">
    <input type="number" name="num" placeholder="Enter any number here...">
    <button type="submit" name="submit" value="Submit">Submit</button>
</form>
