<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 11:10 AM
 */

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['create_seller']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $country = isset($_POST['country']) ? Form::sanitise($_POST['country']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $countryError = Validator::validateText('Country', $country, 30);
    if ($countryError != null) {
        throw new \Exception($countryError);
    }

    $seller = new Entity\Seller($name, $country, 0, 0);
    $result = Controller\Seller::create($seller);

    if($result !== true) {
        throw new \Exception("Seller creation failed");
    } 
    $message = "Seller created successfully";
    echo $message;

} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}