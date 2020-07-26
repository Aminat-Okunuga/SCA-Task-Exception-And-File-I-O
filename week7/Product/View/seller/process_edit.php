<?php

include_once '../../autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['edit_seller']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $status = isset($_POST['status']) ? Form::sanitise($_POST['status']) : null;
    $seller_id = isset($_POST['seller_id']) ? Form::sanitise($_POST['seller_id']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $statusError = Validator::validateNumber('Status', $status);
    if ($statusError != null) {
        throw new \Exception($statusError);
    }

    $sellerError = Validator::validateNumber('Seller', $seller_id);
    if ($sellerError != null) {
        throw new \Exception($sellerError);
    }

    $seller = new Entity\seller($name);
    $seller->status = $status;
    $seller->id = $seller_id;

    $result = Controller\seller::edit($seller);

    if($result !== true) {
        throw new \Exception("seller edit failed");
    }
    $message = "seller edited successfully";
    echo $message;
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}