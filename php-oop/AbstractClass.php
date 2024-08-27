<?php

require_once "data/Location.php";

use Data\{Location, City};

// // Abstract Class tidak bisa digunakan, kecuali hanya diturunkan kepada turanannya
// Ini error
// $location = new Location();
// $location->name = "Jakarta";
// echo $location->name . PHP_EOL;

// Sukses
$city = new City();
$city->name = "Jakarta";

echo $city->name . PHP_EOL;
