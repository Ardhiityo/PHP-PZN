<?php

require_once "data/Shape.php";

// Karena menggunakan namespace, maka harus menggunakan use untuk memudahkan memanggilnya, jika di dalamnya terdapat banyak class, atau functioon dan lainnya
use Data\{shape, rectangle};

$rectangle = new Rectangle();
echo $rectangle->getCorner() . PHP_EOL;
echo $rectangle->getParentCorner() . PHP_EOL;
