<?php

// Array Iterator Manual

function getgenap($max)
{
    $array = [];
    for ($i = 1; $i <= $max; $i++) {
        if ($i % 2 == 0) {
            $array[] = $i;
        }
    }
    return new ArrayIterator($array);
}

$genap = getgenap(100);
foreach ($genap as $value) {
    echo "Genap : $value" . PHP_EOL;
}


function getganjil($max)
{
    for ($i = 1; $i <= $max; $i++) {
        if ($i % 2 == 1) {
            yield $i;
        }
    }
}

$ganjill = getganjil(100);
foreach ($ganjill as $value) {
    echo "Ganjil : $value" . PHP_EOL;
}
