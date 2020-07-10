<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03-Jul-20
 * Time: 1:25 PM
 */

try {
    $file = "/wamp/www/SCA-Task/task-03/task.txt";
    $pointer = fopen($file, "r+");
    if ($pointer == false) {
        throw new Exception("File not found!");
    }

    $file_size = filesize($file);
    $content = fread($pointer, $file_size);

    fclose($pointer);
    $pointer = fopen($file, "w+");

    $lines = explode("\n", trim($content, "\n"));

    $no_of_lines = count($lines);
    for ($index = 0; $index < $no_of_lines; $index++) {
        $number = $lines[$index];
        if($number % 5 == 0) {
            var_dump("Aminat");
            fwrite($pointer, "Aminat"."\n");
        } else {
            var_dump($number);
            fwrite($pointer, $number."\n");
        }
    }

} catch (Exception $ex) {
    echo $ex->getMessage();
}