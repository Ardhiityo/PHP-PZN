<?php


require_once 'vendor/autoload.php';

// Autoload dari library yang kita buat
use Pzn\BelajarMembuatLibrary\Customer;

$customer = new Customer("Eko");
echo $customer->sayHello("Budi") . PHP_EOL;

$customers = new Customer("Eko");
echo $customer->sayHello() . PHP_EOL;
