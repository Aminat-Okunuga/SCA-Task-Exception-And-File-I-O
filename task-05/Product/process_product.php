<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 10:40 AM
 */

include_once 'autoload.php';

use \Library\Form as Form;
use \Library\Validator as Validator;

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new \Exception("Invalid request format, please try again");
    }

    if (!isset($_POST['create_product']) && $error == null) {
        throw new \Exception("Invalid request format, please try again");
    }

    $name = isset($_POST['name']) ? Form::sanitise($_POST['name']) : null;
    $description = isset($_POST['description']) ? Form::sanitise($_POST['description']) : null;
    $price = isset($_POST['price']) ? Form::sanitise($_POST['price']) : null;
    $brand = isset($_POST['brand']) ? Form::sanitise($_POST['brand']) : null;
    $color = isset($_POST['color']) ? Form::sanitise($_POST['color']) : null;
    $picture = isset($_POST['picture']) ? Form::sanitise($_POST['picture']) : null;
    $seller = isset($_POST['seller']) ? Form::sanitise($_POST['seller']) : null;
    $category = isset($_POST['category']) ? Form::sanitise($_POST['category']) : null;
    $rating = 0;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $descriptionError = Validator::validateText('Description', $description, 250);
    if ($descriptionError != null) {
        throw new \Exception($descriptionError);
    }

    $priceError = Validator::validateNumber('Price', $price);
    if ($priceError != null) {
        throw new \Exception($priceError);
    }

    $brandError = Validator::validateText('Brand', $brand, 30);
    // TODO: Check if brand exists
    if ($brandError != null) {
        throw new \Exception($brandError);
    }

    $colorError = Validator::validateText('Color', $color, 30);
    if ($colorError != null) {
        throw new \Exception($colorError);
    }

    // TODO: Validate picture
    // $pictureError = Validator::validateText($picture, 30);
    // if($pictureError != null) {
    //     throw new \Exception($pictureError);
    // }

    $sellerError = Validator::validateText('Seller', $seller, 30);
    // TODO: Check if seller exists
    if ($sellerError != null) {
        throw new \Exception($sellerError);
    }

    $categoryError = Validator::validateText('Category', $category, 30);
    // TODO: Check if category exists
    if ($categoryError != null) {
        throw new \Exception($categoryError);
    }

    $product = new Entity\Product($name, $description, $price, $brand, $color, $picture, $rating, $seller, $category);

    var_dump($product);

} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}