<?php

// Cara ke 1
$buah = array("Mangga", "Apel", "Jeruk");
var_dump($buah);

echo "\n";

// Cara ke 1
$buah = ["Mangga", "Apel", "Jeruk"];
var_dump($buah);

// Mengakses Array
var_dump($buah[0]);

// Merubah isi Array
$buah[0] = "Pisang";
var_dump($buah);

// Menghapus isi Array (index otomatis akan hilang, tetapi tidak bergeser)
unset($buah[0]);
var_dump($buah);

// Index ke 0 sudah terhapus
var_dump(isset($buah[0]));

// Menambahkan isi Array
$buah[] = "Semangka";
var_dump($buah);

// Menghitung jumlah isi Array
var_dump(count($buah));


// Arrray sebagai Map (Array Asosiasi)

// Cara ke 1
$person = array(
    "id" => "1",
    "name" => "Eko",
    "age" => 30,
);

var_dump($person);

// Mengakses Array Asosiasi
var_dump($person["name"]);

// Cara ke 2
$person = [
    "id" => "1",
    "name" => "Eko",
    "age" => 30,
];

var_dump($person);

// Mengakses Array Asosiasi
var_dump($person["name"]);


// Array di dalam Array
$person = [
    "id" => "1",
    "name" => "Eko",
    "age" => 30,
    "address" => [
        "city" => "Jakarta",
        "country" => "Indonesia"
    ]
];

// Mengakses Array di dalam Array
var_dump($person["address"]);
var_dump($person["address"]["country"]);
