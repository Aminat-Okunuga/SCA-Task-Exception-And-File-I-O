<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03-Jul-20
 * Time: 8:19 AM
 */
try {
    $task_file = fopen("/wamp/www/SCA-Task/task-03/task.txt", "w");
    if ($task_file == false) {
        throw new Exception("The task.txt file not Found");
    }else{
        for ($x = 1; $x <= 50; $x++) {
            echo $x;
            if ($x % 2 == 0){
                echo " =>even <br>";
            }else{
                echo " =>odd <br>";
            }
            $write = fwrite($task_file, $x."\n");
        }

    }


    if ($write == false) {
        throw new Exception("Content writing failed!");
    }
    fclose($task_file);
} catch (Exception $ex){
    echo $ex->getMessage();
}