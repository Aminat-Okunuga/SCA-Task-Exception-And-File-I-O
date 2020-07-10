<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02-Jul-20
 * Time: 2:22 PM
 */

namespace factorialClass;
//function to take an integer and calculate its factorial

class FactorialWithException
{


    public function factorialWithExceptionHandling($num)
    {
        try {
            if (!is_numeric($num)) {
                throw new \Exception("You have to enter an integer!");
            } else {
                $factorial = 1;
                for ($a = $num; $a >= 1; $a--) {
                    $factorial = $factorial * $a;
                }
                echo $factorial."<br>";
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

//function call
$fact = new FactorialWithException();
$fact->factorialWithExceptionHandling(5);
$fact->factorialWithExceptionHandling('b');