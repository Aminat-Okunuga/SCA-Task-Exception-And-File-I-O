<?php

namespace grade;


class Grade
{
//    Properties
public $grade_id;
public $grade_name;
public $teacher;
public $subject;

public function __construct($grade_id, $grade_name, $teacher, $subject)
{
    $this->grade_id = $grade_id;
    $this->grade_name = $grade_name;
    $this->teacher = $teacher;
    $this->subject = $subject;
}

    public function getGradeId(){
   return $this->grade_id;
}
public function getGradeName(){
   return $this->grade_name;
}
public function getTeacher(){
   return $this->teacher;
}
public function getSubject(){
   return $this->subject;
}


}
