<?php

require_once __DIR__ . "/data/Person.php";

$person = new Person("Eko", "Bandung");

echo $person->name . PHP_EOL;
$person->info();
