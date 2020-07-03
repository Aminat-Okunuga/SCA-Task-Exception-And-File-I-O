<?php

class Calculator
{
private $num1;
private $num2;

public function __construct($num1, $num2)
{
    $this->num1 = $num1;
    $this->num2 = $num2;
}

public function addNumbers(){
    return $this->num1 + $this->num2;
}

public function subtractNumbers(){
    return $this->num1 - $this->num2;
}

public function multiplyNumbers(){
    return $this->num1 * $this->num2;
}

public function divideNumbers(){
    return $this->num1 / $this->num2;
}

}

$num2 = 22;
$num1 = 12;
//instantiating calculator class
$myCalculator = new Calculator($num1, $num2);
echo $myCalculator->addNumbers() ."<br><br>";
echo $myCalculator->subtractNumbers() ."<br><br>";
echo $myCalculator->multiplyNumbers() ."<br><br>";
echo $myCalculator->divideNumbers() ."<br><br>";
