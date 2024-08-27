<?php

require_once "data/Student.php";

$student = new Student();
$student->id = "1";
$student->name = "Ardhi";
$student->value = 100;

// toString

// Cara 1
$string = (string) $student;
var_dump($string);

// Cara 2
echo $student . PHP_EOL;


// Invoke Function
$student(1, "Ardhi", true, 100.0);
