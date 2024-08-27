<?php

$nama = "Rizky";
$umur = 20;

// PHP_EOL = End of Line
echo "Nama : " . $nama . PHP_EOL;
echo "Umur : " . $umur . PHP_EOL;


// Konversi Tipe Data

// Ke Integer
$value = "100";
var_dump((int)$value);

// Ke String
$value = 100;
var_dump((string)$value);

// Ke Float
$value = "1.12";
var_dump((float)$value);

// Jika salah maka tidak akan error, tetapi menjadi int 0
$value = "Abc";
var_dump((int)$value);


// Mengakses karakter
$nama = "Eko";
var_dump($nama[0]);
var_dump($nama[1]);
var_dump($nama[2]);

// Jika tidak ada indexnya, maka akan error
// var_dump($nama[3]);


// Variabel Parsing

$nama = "Eko";

// Tidak perlu menggunakan titik seperti ini
echo "Nama : " . $nama . PHP_EOL;

// Jika double quote, bisa langsung seperti ini
echo "Nama : $nama  " . PHP_EOL;

// Namun jika single quote, tidak bisa memanggil variabel di dalam quote
echo 'Nama : $nama  ' . PHP_EOL;


// Curly Brace : Untuk memanggil variabel di dalam string namun ingin menyisipkan karakter lain setelah variabel tanpa spasi
$var = "Eko";

// Dengan Curly Brace
echo "Nama : {$var}s" . PHP_EOL;

// Tanpa Curly Brace
echo "Nama : $var s" . PHP_EOL;
