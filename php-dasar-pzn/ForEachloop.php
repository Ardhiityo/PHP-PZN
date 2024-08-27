<?php

$data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Tanpa Index
foreach ($data as $value) {
    echo $value . PHP_EOL;
}

// Dengan index / Property
foreach ($data as $key => $value) {
    echo " Key : $key : Value : $value " . PHP_EOL;
}
