<?php
namespace Staff;
class Staff
{
public $fname;
public $lname;
public $sex;
public $id;

public function __construct($id, $fname, $lname, $sex)
{
    $this->sex = $sex;
    $this->lname = $lname;
    $this->fname = $fname;
    $this->id = $id;
}


public function getName(){
    return $this->fname . $this->lname;
}

public function getSex(){
    return $this->sex;
}

public function getId(){
    return $this->id;
}
}