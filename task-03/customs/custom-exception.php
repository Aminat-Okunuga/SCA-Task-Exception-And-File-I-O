<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02-Jul-20
 * Time: 11:37 PM
 */
namespace customs;
class ValidateEmail extends \Exception {}

$phone = "";

try{
    if($phone == ""){
        throw new ValidateEmail("Kindly enter your phone number");
    }
    echo "Phone Validation successful";
}catch (ValidateEmail $ex){
    echo $ex->getMessage();
}

class Email{

}