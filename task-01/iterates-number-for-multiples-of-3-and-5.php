<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 14-Jun-20
 * Time: 1:28 PM
 */
$n = 1;
while ($n <= 50) {
    if ($n % 3 == 0 && $n % 5 == 0) {
        echo "FizzBuzz <br/>";
    } elseif ($n % 3 == 0) {
        echo "Fizz <br/>";
    } elseif ($n % 5 == 0) {
        echo "Buzz <br/>";
    }
    $n++;
}