<?php

$nama = "Fahmi";
$umur = 20;

echo "Nama : ";
echo $nama;
echo "\n";
echo "Umur : ";
echo $umur;

echo "\n";

// PHP memiliki kemampuan variable variables, yaitu membuat variable dari string value variable
// Walaupun fitur ini ada, tapi fitur ini sangat membingungkan jika digunakan secara luas, jadi disarankan untuk tidak menggunakan fitur ini kecuali memang diperlukan
$samsung = "galaxy";
$$samsung = "Samsung Galaxy S21";

echo $samsung;
echo "\n";
echo $galaxy;
