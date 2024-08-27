<?php

// Constant adalah tempat untuk menyimpan data yang tidak bisa dirubah lagi setelah di deklarasikan
// Untuk membuat constant kita bisa menggunakan function define()
// Best practice pembuatan nama constant adalah menggunakan UPPER_CASE

define("APPLICATION", "Belajar PHP Dasar");
define("NUMBER", 123);

// Jika dicoba untuk diubah maka akan error
// define("APPLICATION", "Belajar PHP Dasar");

// Ini juga error
// APPLICATION = "Diubah";

// Jika seperti ini tidak error
$APPLICATION = "Belajar PHP bersama PZN";
echo $APPLICATION;

// Pemanggilan tidak perlu mengggunakan $
echo APPLICATION;
echo "\n";
echo NUMBER;
