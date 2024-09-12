<?php

require_once 'vendor/autoload.php';

// Autoload Class Buatan sendiri
use Pzn\Composer\data\People;

echo "Hello World" . PHP_EOL;

// Autoload Class Buatan sendiri
$people = new People();
$people->say();
