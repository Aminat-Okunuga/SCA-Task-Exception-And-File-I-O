<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 10:19 AM
 */

namespace Entity;
class Product
{
//Properties
    public $name;
    public $description;
    public $price;
    public $brand;
    public $color;
    public $pictures = array();
    public $rating;
    public $seller;
    public $category;

//    Constructor
    public function __construct($name, $description, $price, $brand, $color, $pictures, $rating, $seller, $category)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->brand = $brand;
        $this->color = $color;
        $this->pictures = $pictures;
        $this->rating = $rating;
        $this->seller = $seller;
        $this->category = $category;
    }
}