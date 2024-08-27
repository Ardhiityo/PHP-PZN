<?php

$array = [
    "firstName" => "Ardhi",
    "middleName" => "Yudha",
    "lastName" => "Tio"
];

// Sebelum dikonverrsi ke tipe data object
echo $array["firstName"] . PHP_EOL;


// Array to Object

// Setelah dikonverrsi ke tipe data object
$object = (object)$array;
var_dump($object);

echo "First Name $object->firstName" . PHP_EOL;
echo "Middle Name $object->middleName" . PHP_EOL;
echo "Last Name $object->lastName" . PHP_EOL;

// Object to Array
$arrayLagi = (array)$object;
var_dump($arrayLagi);


// Atau dari Class Ke Array
require_once "Data/Person.php";

$person = new Person("Ardhi", "Tio");
var_dump($person);

$toArrray = (array)$person;
var_dump($toArrray);
