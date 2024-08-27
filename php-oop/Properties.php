<?php

require_once "data/Person.php";

$person = new Person("Eko", "Bandung");

// Manipulasi properties 
// Untuk mengakses field, kita butuh kata kunci -> setelah nama object dan diikuti nama fields nya

$person->name = "Ardhi";

// Mengirim nilai null
$person->address = null;

echo "Name : {$person->name}" . PHP_EOL;
echo "Address : {$person->address}" . PHP_EOL;

var_dump($person);

// error
// $person->name = [];
