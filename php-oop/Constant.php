<?php

require_once __DIR__ . "/data/Person.php";

// Constant dengan penamaan versi lama
define("APPLICATION", "Belajar PHP OOP");
echo APPLICATION . PHP_EOL;

// Constant dengan penamaan versi baru
const APPLICATIONS = "Belajar PHP OOP";
echo APPLICATIONS . PHP_EOL;

$person = new Person("Eko", "Bandung");


// Constant nempel langsung dengan class bukan pada objectnya;

// Mengakses constant pada class cara 1
echo $person::AUTHOR . PHP_EOL;

// Mengakses constant pada class cara 2
echo Person::AUTHOR . PHP_EOL;
