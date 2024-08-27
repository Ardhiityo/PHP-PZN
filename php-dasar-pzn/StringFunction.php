<?php

$data = "Hello World";

// Merubah String menjadi huruf besar
echo strtoupper($data) . PHP_EOL;

// Merubah String menjadi huruf kecil;
echo strtolower($data) . PHP_EOL;

// Menggabungkan Array menjadi String berdasarrkan ","
echo implode(",", ["Hello", "World"])  . PHP_EOL;
echo join(",", ["Hello", "World"])  . PHP_EOL;

// Merubah dari String menjadi Arrray berdasarkan " "
var_dump(explode(" ", "Hello World"));

// Menghapus whitespace di depan dan belakang pada string, namun jika ada di tengah tidak akan dihapus
echo trim("      Hello World     ") . PHP_EOL;
// Tanpa trim
echo ("      Hello World    ") . PHP_EOL;

// Mengambil sebagian string mulai dari index 0, sampai index 5
echo substr("Hello World", 0, 5) . PHP_EOL;
