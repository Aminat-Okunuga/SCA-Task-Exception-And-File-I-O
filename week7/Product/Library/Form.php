<?php

namespace Library;

class Form {

    public static function sanitise($input){
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
    
        return $input;
    }

}