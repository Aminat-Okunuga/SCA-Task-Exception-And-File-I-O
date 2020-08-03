<?php

namespace Entity;

class Product {
    public $name;
    public $description;
    public $price;
    public $brand;
    public $color;
    public $pictures = array();
    public $rating;
    public $seller;
    public $category;

    public function __construct($name, $description, $price, $brand, $color, $pictures, $rating, $seller, $category) {
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