<?php

require_once "data/Manager.php";

$manager = new Manager();
$manager->name = "Ari";
$manager->sayHelloo("Ardhi");

echo PHP_EOL;

$vp = new VicePresident();
$vp->name = "Adi";

// Override Constructor
echo $vp->title;

echo PHP_EOL;

// Function sayHello akan mengambil milik turrnannya, jika menggunakan object turnannya, namun jika menggunakan parent nya, maka akan mengambil parentnya
$vp->sayHelloo("Ardhiityo");
