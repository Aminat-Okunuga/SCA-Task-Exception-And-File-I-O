<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 02-Jul-20
 * Time: 12:00 PM
 */


//function that displays if an alphabet is consonant or vowel
function vowelOrConsonant($input)
{
    try {
        if (!ctype_alpha($input)) {
            throw new Exception("An alphabet should be entered");
        }
        if ($input == 'a' || $input == 'e' || $input == 'i' || $input == 'o' || $input == 'u') {
            echo "The alphabet entered is: Vowel <br>";
        } else {
            echo "The alphabet entered is: Consonant <br>";
        }
    } catch (Exception $ex) {
        echo $ex->getMessage() . "<br>";
    }
}

// Function call
vowelOrConsonant('a');
vowelOrConsonant(3);
