<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 14-Jun-20
 * Time: 8:00 AM
 */
$num = 6;
$factorial = 1;
for($x = $num; $x >= 1; $x--){
    $factorial = $factorial * $x;
}
echo "The factorial of $num is: ". $factorial;