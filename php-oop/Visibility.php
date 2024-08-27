<?php

require_once "data/Product.php";

$product = new Product("Apple", 20000);

// Error karena visibility privates
// echo $product->name . PHP_EOL;

// Error karena visibility protected
// echo $product->price . PHP_EOL;

echo $product->getName() . PHP_EOL;

$dummy = new ProductDummy("Dummy", 1000);

// Protected bisa diakses melalui turunan kelasnya
$dummy->info();
