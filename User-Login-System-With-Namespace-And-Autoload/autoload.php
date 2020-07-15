<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 10-Jul-20
 * Time: 10:03 AM
 */

spl_autoload_register(function ($class_name) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    include $file;
});

$user = new \model\Users();