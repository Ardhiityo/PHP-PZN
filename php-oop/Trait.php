<?php

require_once "data/SayGoodbye.php";

use Data\{Person};

$person = new Person();
$person->goodBye("Ardhi");

echo PHP_EOL;

$person->hello("Ardhi");

echo PHP_EOL;

$person->name = "Ardhi";

var_dump($person);


$person->run();
