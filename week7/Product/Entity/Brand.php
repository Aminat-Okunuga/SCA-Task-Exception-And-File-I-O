<?php

namespace Entity;

class Brand {
    public $id;
    public $name;
    public $categories;

    public function __construct($name, $categories) {
        $this->name = $name;
        $this->categories = $categories;
    }

//    public function getId()
//    {
//        return $this->id;
//    }
//
//    public function setId($id)
//    {
//        $this->id = $id;
//    }

    public function getName() {
        return $this->name;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCategories($categories) {
        $this->categories = $categories;
    }
}