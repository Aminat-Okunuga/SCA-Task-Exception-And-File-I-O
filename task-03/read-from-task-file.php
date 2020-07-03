<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03-Jul-20
 * Time: 10:30 AM
 */

try{
    $file = "/wamp/www/SCA-Task/task-03/task.txt";
    $pointer = fopen($file, "r+");
    if ($file == false){
        throw new Exception("File not found!");
    }
    $file_size = filesize($file);
    $content = fread($pointer, $file_size);

    if ($content % 2 == 0){

    } echo "The content of task.txt file is: " .$content. "<br>";

} catch(Exception $ex){
    echo $ex->getMessage();
}