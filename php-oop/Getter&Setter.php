<?php

require_once "data/Category.php";

use Data\Category;

$category = new Category();

$category->setName("Handphone");
echo $category->getName();
$category->setName("   ");

echo PHP_EOL;

$category->setExpensive(true);
echo $category->isExpensive();
