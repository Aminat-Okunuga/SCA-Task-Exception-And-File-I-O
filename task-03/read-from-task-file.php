<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03-Jul-20
 * Time: 10:30 AM
 */

try {
    $file = "/wamp/www/SCA-Task/task-03/task.txt";
    $pointer = fopen($file, "r+");
    if ($file == false) {
        throw new Exception("File not found!");
    }
    $file_size = filesize($file);
    $content = fread($pointer, $file_size);
    if (is_numeric($content)) {
//        for ($content = 1; $content <= 50; $content++) {
        while ($content <= 50) {
//            $file_size = filesize($file);
//            $content = fread($pointer, $file_size);
            if ($content % 2 == 0) {
                $write = fwrite($pointer, "even\n");
            } elseif ($content % 2 == 1) {
                $write = fwrite($pointer, "odd\n");
            }
            echo "The content of task.txt file is: " . $content;



        }
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}