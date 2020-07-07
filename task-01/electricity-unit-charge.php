<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 14-Jun-20
 * Time: 1:59 PM
 */
if (isset($_POST['submit'])){
    $num = $_POST['number'];


$num = $_POST['number'];
$sum = 0;
switch ($num){
    case 50:
        $result1 = 50 * $num;
        $sum += $result1;
    case 100:
        $result2 = 75 * $num;
        $sum += $result2;
    case 100:
        $result3 = 120 * $num;
        $sum += $result3;
    case $num > 250:
        $result4 = 150 * $num;
        $sum += $result4;
        echo "The sum is: ".$sum;
        break;
}
}
?>
<html>
<head>
    <title>Electricity Unit</title>
</head>
<body>
<form action="" method="post">
    <input type="number" name="number" placeholder="Enter unit here...">
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
