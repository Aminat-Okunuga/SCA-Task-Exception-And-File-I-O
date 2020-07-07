<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 03-Jul-20
 * Time: 6:41 AM
 */

class Users
{
    // Properties
    public $fullName;
    public $gender;
    public $dob;
    public $password;

    public $fullNameValid = false;
    public $genderValid = false;
    public $dobValid = false;
    public $passwordValid = false;

    public $valid;

    public function __construct($fullName, $gender, $dob, $password) {
        $this->fullName = $fullName;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->password = $password;

        $this->valid = false;
        $this->validate();
    }

    public function isValid() {
        return $this->fullNameValid && $this->genderValid && $this->dobValid && $this->passwordValid;
    }

    private function validate() {
        $this->validateFullName();
        $this->validateGender();
        $this->validateDOB();
        $this->validatePassword();
    }

    public function validateFullName() {
        if($this->fullName == ""){
            throw new Exception("You must enter your first and last name\n");
        }

        $names = explode(" ", trim($this->fullName));
        $number_of_names = count($names);
        if($number_of_names != 2) {
            throw new Exception("You must enter your first and last name\n");
        }
        $this->fullNameValid = true;
    }

    public function validateGender() {
        if($this->gender == ""){
            throw new Exception("You must a valid gender\n");
        }

        // Male OR Female
        $gender = strtolower($this->gender);
        if($gender != "male" && $gender != "female") {
            throw new Exception("You must a valid gender\n");
        }
        $this->genderValid = true;
    }

    public function validateDOB() {
        if($this->dob == ""){
            throw new Exception("You must a valid date of birth\n");
        }

        // NOW
        $date = new DateTime($this->dob, new DateTimeZone("Africa/Lagos"));
        $year = $date->format("Y");

        if($year > 2000) {
            throw new Exception("You are too young\n");
        }
        $this->dobValid = true;
    }

    public function validatePassword() {
        if($this->password == ""){
            throw new Exception("You must a valid password\n");
        }

        if(!strlen($this->password) > 8 ){
            throw new Exception("Your password must be more than 8 characters\n");
        }

        $uppercase = preg_match('@[A-Z]@', $this->password);
        $lowercase = preg_match('@[a-z]@', $this->password);
        $number = preg_match('@[0-9]@', $this->password);

        if(!$uppercase || !$lowercase || !$number || strlen($this->password) < 8){
            throw new Exception("Password must contain a number, a lowercase and uppercase letter\n");
        }
        $this->passwordValid = true;
    }

}

$fullName = "Okunuga Aminat";
//$password = "A";
$password = "Aminat12";
$dob = "1999-12-24";

// Male OR Female

$gender = "male";

try{
    $user = new Users($fullName, $gender, $dob, $password);
} catch(Exception $ex){
    echo $ex->getMessage();
}