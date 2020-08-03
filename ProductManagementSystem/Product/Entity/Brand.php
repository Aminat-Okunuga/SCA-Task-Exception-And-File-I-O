<?php

namespace Entity;

class Brand {
    public $name;
    public $category;

    public function __construct($name, $category) {
        $this->name = $name;
        $this->category = $category;
    }

    public function getName() {
        return $this->name;
    }

    public function getCategories() {
        return $this->category;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCategories($category) {
        $this->category = $category;
    }
}