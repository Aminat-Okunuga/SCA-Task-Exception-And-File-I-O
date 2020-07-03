<?php

spl_autoload_register(function ($class_name) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name). '.php';
    include $file;
});

$id = 2;
$fname = "Adekoya";
$lname  = "Modupe";
$sex = "Female";

$staff  = new staff\Staff($id, $fname, $lname, $sex); //relative linking


$student_id = 2;
$fname = "Aminat";
$lname = "Okunuga";
$sex = 'female';
$dob = '1980';
$grade_id = 4;
$grade_name = "SS3";
$teacher = "Kolade";
$subject_name = "Mathematics";

$grade = new grade\Grade($grade_id, $grade_name, $teacher, $subject_name);

$student = new Students\Student($student_id, $fname, $lname,$sex, $dob, $grade);


$id = 2;
$fname = "Komolafe";
$lname = "Charles";
$sex = "Male";

$teacher = new teacher\Teacher($id, $fname, $lname, $sex);  //relative linking


$subject_id = 2;
$subject_name = "Mathematics";
$subject = new \subject\Subject($subject_id, $subject_name);    //absolute linking

echo $subject_name."<br>";
echo $subject_id;
?>