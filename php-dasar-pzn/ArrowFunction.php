<?php

$firtname = "John";
$lastname = "Doe";

// Untuk mengakses variable di luar function bisa tanpa menggunakan use, tetapi nama variabel harus sama
$arrow = fn() =>  "Hello $firtname $lastname";

echo $arrow();
