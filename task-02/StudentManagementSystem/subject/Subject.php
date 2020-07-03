<?php

namespace subject;


class Subject
{
public $subject_id;
public $subject_name;

public function __construct($subject_id, $subject_name)
{
    $this->subject_id = $subject_id;
    $this->subject_name = $subject_name;
}

public function getSubjectId(){
    return $this->subject_id;
}
public function getSubjectName(){
    return $this->subject_name;
}
}