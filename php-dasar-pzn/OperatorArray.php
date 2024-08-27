<?php

// Operator Array akan menggabungkan dua array apabila memiliki key yang berbeda

$a = ["namaDepan" => "Eko"];
$b = ["namaBelakang" => "Kurniawan"];

var_dump($a + $b);

$c = ["Nol" => 1, "Satu" => 2, "Dua" => 3];
$d = ["Tiga" => 4, "Empat" => 5, "Lima" => 6];

// Union
var_dump($c + $d);

// Equality
var_dump($c == $d);

// Idendity
var_dump($c === $d);

// Inequality
var_dump($c != $d);

// Inequality
var_dump($c <> $d);

// Non-Idendity
var_dump($c !== $d);


$a = ["namaDepan" => "Eko", "namaBelakang" => "Kurniawan"];
$b = ["namaBelakang" => "Kurniawan", "namaDepan" => "Eko"];

var_dump($a == $b); //true
var_dump($a === $b); //false
