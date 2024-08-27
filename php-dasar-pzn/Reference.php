<?php

// Assign by Reference

$name = "John";

$change = &$name;
$change = "Doe";

// Akan berubah
echo $name;

echo PHP_EOL;

// Tanpa Reference
$name2 = "John";

$change2 = $name2;
$change2 = "Doe";

// Tidak akan berubah
echo $name2;

echo PHP_EOL;


// Pass by Reference

// Tanpa reference
function increment($value)
{
    $value++;
}

$count = 1;
increment($count);

// Akan selalu bernilai 1
echo $count;

echo PHP_EOL;

// Dengan reference
function increment2(&$value)
{
    $value++;
}

$count2 = 1;
increment2($count2);

// Akan berubah
echo $count2;

echo PHP_EOL;

// Returning reference
function &getValue()
{
    static $value = 3;
    return $value;
}

$a = &getValue(); //3
$a = 4; //4

$b = &getValue();
echo $b;
