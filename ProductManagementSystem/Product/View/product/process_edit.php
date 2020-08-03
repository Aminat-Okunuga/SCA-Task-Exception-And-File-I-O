<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['edit_product']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;
    $product_id = isset($_POST['product_id']) ? Form::sanitise($_POST['product_id']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $statusError = Validator::validateNumber('Status', $status);
    if ($statusError != null) {
        throw new \Exception($statusError);
    }

    $productError = Validator::validateNumber('Product', $product_id);
    if ($productError != null) {
        throw new \Exception($productError);
    }

    $product = new Entity\Product($name);
    $product->status = $status;
    $product->id = $product_id;

    $result = Controller\Product::edit($product);

    if($result !== true) {
        throw new \Exception("Product edit failed");
    }
    header('location: view.php');
    $message = "Product edited successfully";
    echo $message;
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}