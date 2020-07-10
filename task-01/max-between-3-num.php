<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 14-Jun-20
 * Time: 7:41 AM
 */

$a = 4;
$b = 10;
$c = 7;
$max = $a;

if($b > $a){
    $max = $b;
}elseif ($c > $max){
    $max = $c;
}

echo $max. " is the maximum among the three numbers";


if ($a > $b && $a > $c) {
    echo $a . " is the maximum among the three numbers ";
} elseif ($b > $a && $b > $c) {
    echo $b . " is the maximum among the three numbers ";
} else {
    echo $c . " is the maximum among the three numbers ";
}