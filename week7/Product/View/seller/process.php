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
    $score = isset($_POST['score']) ? Form::sanitise($_POST['score']) : null;
    $follower = isset($_POST['follower']) ? Form::sanitise($_POST['follower']) : null;

    $nameError = Validator::validateText('Name', $name, 30);
    if ($nameError != null) {
        throw new \Exception($nameError);
    }

    $scoreError = Validator::validateNumber('Score', $score);
    if ($scoreError != null) {
        throw new \Exception($scoreError);
    }

    $followerError = Validator::validateNumber('Follower', $follower);
    if ($followerError != null) {
        throw new \Exception($followerError);
    }

    $countryError = Validator::validateText('Country', $country, 30);
    // TODO: Cżeck if category exists
    if ($countryError != null) {
        throw new \Exception($countryError);
    }

    $seller = new Entity\Seller($name, $score, $country, $follower);

    var_dump($seller);

} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}