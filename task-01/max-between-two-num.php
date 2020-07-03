<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 14-Jun-20
 * Time: 7:29 AM
 */

$a = 4;
$b = 10;
if($a > $b){
    echo $a . " is greater than ".$b;
}elseif($b > $a){
    echo $b . " is greater than ".$a;
} else{
    echo $b ." is equal to ". $a;
}