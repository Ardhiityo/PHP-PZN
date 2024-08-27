<?php

require_once "data/Conflict.php";
require_once "data/Helper.php";

// Kadang kita butuh melakukan import banyak hal di satu namespace yang sama
// PHP memiliki fitur grup use, dimana kita bisa import beberapa class, function atau constant dalam satu perintah use
// Untuk melakukan itu, kita bisa menggunakan kurung { } 
use Data\One\{Conflict as Con, Sample, Dummy};
use function Helper\{helpMe};
use const Helper\{APPLICATION};

$conflict = new Con();
$sample = new Sample();
$dummy = new Dummy();

var_dump($conflict);

helpMe();
echo APPLICATION . PHP_EOL;
