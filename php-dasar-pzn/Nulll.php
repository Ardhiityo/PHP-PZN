<?php

$nama = "Eko";

// Untuk membuat data NULL, kita bisa menggunakan kata kunci NULL (case insensitive), besar kecilnya tidak berpengaruh
$nama = null;

echo $nama;

echo "\n";

// Mengecek Apakah Data NULL
echo "Is Null? ";
echo is_null($nama);

echo "\n";

$nama = "Eko";
echo "Is Null? ";

echo "\n";

echo "Is Null? ";
echo is_null($nama);

echo "\n";

var_dump(is_null($nama));


// Selain mengubah menjadi NULL, di PHP juga kita bisa menghapus sebuah variable, caranya dengan menggunakan function unset($variable)
// Namun hati-hati, ketika kita hapus variable, kita tidak bisa lagi mengakses variable tersebut, bahkan function is_null($variable) pun akan menjadi error jika mengakses variable tersebut.

$contoh = "Eko";
echo $contoh;

unset($contoh);

// error karena variabel sudah dihapus
// echo $contoh;

// Agar lebih aman, kita bisa menggunakan function isset($variable) untuk mengeccek apakah sebuah variable ada dan nilainya tidak NULL

echo "\nMengecek apakah ada variabel contoh atau tidak : ";
var_dump(isset($contoh));
