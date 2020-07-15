<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 15-Jul-20
 * Time: 10:20 AM
 */

namespace Entity;
class Seller
{
//Properties
    public $name;
    public $country;
    public $followers;
    public $score;

//Constructor
    public function __construct($name, $score, $country, $followers)
    {
        $this->name = $name;
        $this->country = $country;
        $this->score = $score;
        $this->followers = $followers;
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

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getFollower()
    {
        return $this->followers;
    }

    public function setFollower($followers)
    {
        $this->followers = $followers;
    }
}