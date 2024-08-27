<?php

// Dengan Single Quote
echo 'Name : ';
echo 'Eko Kurniawan Khannedy';

echo 'Tipe data : ';
var_dump('Eko Kurniawan Khannedy');

// Dengan Double Quote
// Dengan Double Quote, kita dapat menggunakan escape sequence \n : baris baru dan \t : tab
echo "Nama : \n";
echo "Eko Kurniawan Khannedy";

echo "\nTipe data : \t";
var_dump("Eko Kurniawan Khannedy");

// Heredoc (Multiline String)
// Heredoc adalah cara lain untuk membuat multiline string
echo <<<EKO
Ini adalah contoh heredoc, disini bisa menggunakan escape sequence \n : baris baru dan \t : tab, serta "quote juga", sangat simple.
EKO;

// Nowdoc (Multiline String)
// Newdoc adalah cara lain untuk membuat multiline string, tetapi tidak bissa parsing seperti heredoc
echo <<<'EKO'
Ini adalah contoh nowdoc, disini tidak bisa menggunakan escape sequence \n : baris pun tidak bisa dan \t : tab, tapi bisa pakai "quote"..
EKO;
