<?php

require_once "helper/MathHelper.php";

use Helper\MathHelper;

$mathHelper = new MathHelper();

// Ini sifatnya menempel langsung pada Class;
// Dan bersifat property, jadi valunya bisa diubah
echo MathHelper::$name;

MathHelper::$name = "Ardhi";

echo PHP_EOL;

echo MathHelper::$name;

echo PHP_EOL;

echo MathHelper::sum(1, 2, 3, 4, 5);
