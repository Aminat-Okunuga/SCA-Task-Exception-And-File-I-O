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
    if ($pointer == false) {
        throw new Exception("File not found!");
    }
    $file_size = filesize($file);
    $content = fread($pointer, $file_size);

    $lines = explode("\n", trim($content, "\n"));

    $no_of_lines = count($lines);
    for ($index = 0; $index < $no_of_lines; $index++) {
        $number = $lines[$index];
        if ($number % 2 == 0) {
            echo "$number ==> even\n";
        } elseif ($number % 2 == 1) {
            echo "$number ==> odd\n";
        }
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}