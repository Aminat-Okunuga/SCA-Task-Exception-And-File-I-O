<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['create_category']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $category = new Entity\Category($name);
    $result = Controller\Category::create($category);

    if($result !== true) {
        throw new \Exception("Category creation failed");
    } 
    $message = "Category created successfully";
    echo $message;
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}