<?php
namespace Students;
class Student
{
public $fname;
public $lname;
public $sex;
public $dob;
public $student_id;
public $grade;
//public \grade\Grade $grade;



public function __construct($student_id, $fname, $lname,$sex, $dob, $grade)
{
    $this->fname = $fname;
    $this->student_id = $student_id;
    $this->lname = $lname;
    $this->sex = $sex;
    $this->dob = $dob;
    $this->grade = $grade;
}



public function getName(){
    return $this->fname . $this->lname;
}

public function getSex(){
    return $this->sex;
}

public function getdob(){
    return $this->dob;
}
public function getGrade(){
    return $this->grade;
}

public function getStudentId(){
    return $this->student_id;
}
}