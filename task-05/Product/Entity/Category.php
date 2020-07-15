<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 10:20 AM
 */

namespace Entity;
class Category
{
//Properties
    public $name;

//Constructor
    public function __construct($name)
    {
        $this->name = $name;
    }

//getters and setters
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}