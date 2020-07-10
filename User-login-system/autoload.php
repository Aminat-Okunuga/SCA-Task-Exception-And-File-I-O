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

//$conn;
$database = new \model\Database();
$user = new \model\User();
