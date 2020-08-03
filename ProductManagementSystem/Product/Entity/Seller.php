<?php

namespace Entity;

class Seller {
    public $name;
    public $score;
    public $country;
    public $followers;

    public function __construct($name, $country, $score = null, $followers = null) {
        $this->name = $name;
        $this->score = $score;
        $this->country = $country;
        $this->followers = $followers;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function getFollowers() {
        return $this->followers;
    }

    public function setFollowers($followers) {
        $this->followers = $followers;
    }


    // Methods
    public function follow() {
        $this->followers++;
    }
}