<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03-Jul-20
 * Time: 6:41 AM
 */

class User
{
    //properties
    public $fullName;
    public $gender;
    public $dob;
    public $password;
public function __construct($fullName, $gender, $dob, $password)
{
    $this->fullName = $fullName;
    $this->gender = $gender;
    $this->dob = $dob;
    $this->password = $password;
}



}

$fullName = "Okunuga Aminat";
//$password = "A";
$password = "Aminat12";
$dob = "1999";
$gender = "female";

$user = new User($fullName, $gender, $dob, $password);


try{
    //using regular expression
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if($fullName == ""){
        throw new Exception("You must enter your first and last name");
    }

    if($dob >= 2020){
        throw new Exception("Your date of birth must be below 2020");
    }

    if(!strlen($password) > 8 ){
        throw new Exception("You password must be more than 8 characters");
    }

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8){
        throw new Exception("Password must contain a number, a lowercase and uppercase letter");
    }

    echo "Your password is strong.";
}catch(Exception $ex){
echo $ex->getMessage();

}

