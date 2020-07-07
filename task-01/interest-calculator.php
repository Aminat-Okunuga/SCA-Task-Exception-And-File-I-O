<?php
/**
 * Created by PhpStorm.
 * Users: HP
 * Date: 17-Jun-20
 * Time: 2:39 PM
 */

?>
<html>
<head>
    <title>Simple Interest Calculator</title>
</head>
<body>
<form action="#" method="post">
    Enter Principal Amount
    <input type="text" name="principal"> <br/>
    Enter Rate of Interest
    <input type="text" name="rate"> <br>

    Enter Time Period
    <input type="text" name="time"> <br>

    <input type="submit" name="submit" value="Calculate Interest">

</form>
</body>
</html>
<?php

class SimpleInterest
{
    var $Principal;
    var $Rate;
    var $Time;
    var $Interest;

    function getValues()
    {

        if (isset($_POST['principal'])) {
            $this->Principal = $_POST['principal'];
            $this->Rate = $_POST['rate'];
            $this->Time = $_POST['time'];
        }

    }

    function Calculate()
    {
        $this->Interest = ($this->Principal * $this->Rate * $this->Time) / 100;
    }

    function showValues()
    {
        print "Simple Interest is $this->Interest";
    }

}

$obj = new SimpleInterest();
$obj = new getValues();
$obj = new Calculate();
$obj = new showValues();

?>
