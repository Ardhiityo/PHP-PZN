<?php

require_once "Category.php";

class Product
{
    public function __construct(public string $name, public Category $category = new Category("1", "Anggur")) {}
}

$product = new Product("Mie Ayam");
echo $product->name . PHP_EOL;
echo $product->category->id . PHP_EOL;
echo $product->category->name . PHP_EOL;
