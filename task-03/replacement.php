<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03-Jul-20
 * Time: 1:25 PM
 */

try {
    $task_file = fopen("/wamp/www/SCA-Task/task-03/task.txt", "w");
    if ($task_file == false) {
        throw new Exception("The task.txt file not Found");
    }else{
        for ($x = 1; $x <= 50; $x++) {
            echo $x."<br>";
            $write = fwrite($task_file, $x."\n");
            if ($x % 5 == 0){
//                $replacement = str_replace("$task_file", "$x", "Aminat");
                echo " Aminat <br>";
                $write = fwrite($task_file, "Aminat\n");
            }

        }

    }

    if ($write == false) {
        throw new Exception("Content writing failed!");
    }
    fclose($task_file);
} catch (Exception $ex){
    echo $ex->getMessage();
}