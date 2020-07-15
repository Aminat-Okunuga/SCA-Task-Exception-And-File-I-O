<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 10:20 AM
 */

namespace Entity;
class Brand
{
//Properties
    public $name;
    public $categories;

//Constructor
    public function __construct($name, $categories)
    {
        $this->name = $name;
        $this->categories = $categories;
    }

//Getters and Setters
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
}