<?php

require_once "data/Programmer.php";

$company = new Company();

$company->programmer = new Programmer("Eko");
var_dump($company);

$company->programmer = new BackendProgrammer("Budi");
var_dump($company);

$company->programmer = new FrontendProgrammer("Joko");
var_dump($company);

sayHelloProgrammer(new Programmer("Eko"));
sayHelloProgrammer(new BackendProgrammer("Budi"));
sayHelloProgrammer(new FrontendProgrammer("Joko"));

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

sayHello(new Programmer("Eko"));
sayHello(new BackendProgrammer("Budi"));
sayHello(new FrontendProgrammer("Joko"));
