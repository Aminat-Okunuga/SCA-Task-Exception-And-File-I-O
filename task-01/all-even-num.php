<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 14-Jun-20
 * Time: 6:46 AM
 */

//Program to print all even numbers between 1 to 100 using while loop
$i = 1;
while ($i <= 100){
    if ($i % 2 == 0){
        echo $i ." ";

    }
    $i++;
}