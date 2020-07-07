<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07-Jul-20
 * Time: 4:01 PM
 */

spl_autoload_register(function ($class_name) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    include $file;
});

$host = "localhost";
$username = "root";
$password = "";
$db = "users";
$connection = null;

$conn = new model\Database($host, $username, $password, $db, $connection);
$conn->connectDB();

$user = new model\Users($username, $password);