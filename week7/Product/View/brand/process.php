<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 10:51 AM
 */

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['create_brand']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $category = isset($_POST['category']) ? Form::sanitise($_POST['category']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $categoryError = Validator::validateText('Category', $category, 30);
    // TODO: Check if category exists
    if ($categoryError != null) {
        throw new \Exception($categoryError);
    }

    $brand = new Entity\Brand($name, $category);
//    var_dump($brand);
    $result = Controller\Brand::create($brand);

    if($result !== true) {
        throw new \Exception("Brand creation failed");
    }
    $message = "Brand created successfully";
    echo $message;
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}
