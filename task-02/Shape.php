<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 23-Jun-20
 * Time: 6:05 AM
 */

abstract class Shape
{
//    Class properties
    protected $width;
    protected $height;
    public $name;


//    constructor
    function __construct($width, $height, $name)
    {
        $this->width = $width;
        $this->height = $height;
        $this->name = $name;
    }

//    methods
    function getWidth()
    {
        return $this->width;
    }

    function getHeight()
    {
        return $this->height;
    }
    function getName()
    {
        return $this->name;
    }

    abstract protected function calculateArea();

    abstract protected function calculateCircumference();


}
class Triangle extends Shape
{
    public function calculateArea()
    {
        // TODO: Implement calculateArea() method.
        return "The area of the triangle is : " . (1 / 2) * $this->width * $this->height;
    }

    public function calculateCircumference()
    {
        // TODO: Implement calculateCircumference() method.
        return $this->width + $this->height;
    }

}

class Rectangle extends Shape
{
    public function calculateArea()
    {
        // TODO: Implement calculateArea() method.
        return "The area of the rectangle is : " . $this->width * $this->height;
    }

    public function calculateCircumference()
    {
        // TODO: Implement calculateCircumference() method.
        return 2 * ($this->width + $this->height);
    }

}
$width = 10;
$height = 10;
$name = "triangle";
$name2 = "rectangle";

$rectangle = new Rectangle($width, $height, $name2);
$triangle = new Triangle($width, $height, $name);

echo $triangle->calculateArea() . "<br>";
echo "The circumference of this ".$name. " is: ".$triangle->calculateCircumference() . "<br> <br>";
echo  $rectangle->calculateArea() . "<br>";
echo "The circumference of this ".$name2. " is: ". $rectangle->calculateCircumference();