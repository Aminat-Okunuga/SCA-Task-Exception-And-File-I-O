<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['edit_brand']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;
    $brand_id = isset($_POST['brand_id']) ? Form::sanitise($_POST['brand_id']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $statusError = Validator::validateNumber('Status', $status);
    if ($statusError != null) {
        throw new \Exception($statusError);
    }

    $brandError = Validator::validateNumber('brand', $brand_id);
    if ($brandError != null) {
        throw new \Exception($brandError);
    }

    $brand = new Entity\brand($name);
    $brand->status = $status;
    $brand->id = $brand_id;

    $result = Controller\Brand::edit($brand);

    if($result !== true) {
        throw new \Exception("brand edit failed");
    }
    $message = "brand edited successfully";
    echo $message;
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}