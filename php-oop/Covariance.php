<?php

require_once "data/AnimalShelter.php";
require_once "data/Food.php";

use Data\{Food, AnimalFood};

$catShelter = new CatShelter();
$cat = $catShelter->adopt("Luna");
$cat->eat(new AnimalFood());
var_dump($cat);

$dogShelter = new DogShelter();
$dog = $dogShelter->adopt("Doggy");
$dog->eat(new Food());
var_dump($dog);
