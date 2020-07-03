<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02-Jul-20
 * Time: 12:00 PM
 */


//function that displays if an alphabet is consonant or vowel
function vowelOrConsonant($x)
{
    try {
        if (is_numeric($x)) {
            throw new Exception("An alphabet should be entered");
        }
        if ($x == 'a' || $x == 'e' || $x == 'i' || $x == 'o' || $x == 'u') {
            echo "Vowel <br>";
        } else {
            echo "Consonant <br>";
        }
    } catch (Exception $ex) {
        echo $ex->getMessage() . "<br>";
    }
}

// Function call
vowelOrConsonant('a');
vowelOrConsonant(3);
