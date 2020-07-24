<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 21-Jul-20
 * Time: 12:08 AM
 */

namespace Library;
class Validator
{

    public static function validateText($field, $username)
    {
        if (empty($username)) {
            return "$field cannot be empty";
        }
        return null;
    }

    public static function validateAlphanumeric($field, $password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (empty($password)) {
            return "$field must contain a valid value";
        }if (!strlen($password) > 8) {
            return "Your password must be more than 8 characters";
        }if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            return "Password must contain a number, a lowercase and uppercase letter";
        }
        return null;
    }
}