<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['edit_category']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;
    $category_id = isset($_POST['category_id']) ? Form::sanitise($_POST['category_id']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $statusError = Validator::validateNumber('Status', $status);
    if ($statusError != null) {
        throw new \Exception($statusError);
    }

    $categoryError = Validator::validateNumber('Category', $category_id);
    if ($categoryError != null) {
        throw new \Exception($categoryError);
    }

    $category = new Entity\Category($name);
    $category->status = $status;
    $category->id = $category_id;
    
    $result = Controller\Category::edit($category);

    if($result !== true) {
        throw new \Exception("Category edit failed");
    } 
    $message = "Category edited successfully";
    echo $message;
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}