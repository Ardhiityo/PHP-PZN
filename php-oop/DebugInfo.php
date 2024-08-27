<?php


require_once "data/Student.php";

$student = new Student();
$student->id = "1";
$student->name = "Ardhi";
$student->value = 100;
$student->setSample("Sample");

var_dump($student);
