<?php

// Array Map

$data  = [1, 2, 3, 4, 5];

// Parameter 1 : function callback
// Parameter 2 : Data Array
// array_map(callback, $dataArray)

// Cara 1
var_dump(array_map(fn($value) => $value * 2, $data));

// Cara 2
$map = fn($value) => $value * 2;
var_dump(array_map($map, $data));


// Sort
$data2 = [4, 2, 1, 3, 5];

// Return nya adalah boolean
sort($data2);

// Dengan sort data2 berhasil diurutkan
foreach ($data2 as $value) {
    echo $value . PHP_EOL;
}

// Rsort
$data3 = [1, 2, 3, 4, 5];

// Return nya adalah boolean
rsort($data3);

// Dengan sort data2 berhasil diurutkan secara terbalik
foreach ($data3 as $value) {
    echo $value . PHP_EOL;
}

// Array Keys hanya akan mengambil keys nya saja
$data4 = [
    "first_name" => "Rizky",
    "last_name" => "Kurniawan"
];

var_dump(array_keys($data4));

// Array Values hanya akan mengambil values nya saja
$data5 = [
    "first_name" => "Rizky",
    "last_name" => "Kurniawan"
];

var_dump(array_values($data5));
