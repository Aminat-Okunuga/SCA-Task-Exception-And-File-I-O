<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 02-Jul-20
 * Time: 11:37 PM
 */
namespace customs;
class ValidatePhone extends \Exception {}

$phone = "";

try{
    if($phone == ""){
        throw new ValidatePhone("Kindly enter your phone number");
    }
    echo "Phone Validation successful";
}catch (ValidatePhone $ex){
    echo $ex->getMessage();
}

class Phone{

}