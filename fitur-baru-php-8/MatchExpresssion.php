<?php

// Dengan Swicth Case
$value = "A";
$result = "";

switch ($value) {
    case "A":
    case "B":
    case "C":
        $result =  "Anda lulus" . PHP_EOL;
        break;
    case "D":
        $result =  "Anda tidak lulus" . PHP_EOL;
        break;
    case "E":
        $result =  "Sepertinya anda salah jurusan" . PHP_EOL;
        break;
    default:
        $result =  "Nilai apa itu ? " . PHP_EOL;
}

echo $result;


// Dengan Match Expression
$res = match ($value) {
    "A", "B", "C" => "Anda lulus" . PHP_EOL,
    "D" => "Anda tidak lulus" . PHP_EOL,
    "E" => "Sepertinya anda salah jurusan" . PHP_EOL,
    default => "Nilai apa itu ? " . PHP_EOL,
};

echo $res;


// Match Expression not equal
$val = 70;

$re = match (true) {
    $val >= 80 => "A" . PHP_EOL,
    $val >= 70 => "B" . PHP_EOL,
    $val >= 60 => "C" . PHP_EOL,
    $val >= 50 => "D" . PHP_EOL,
    default => "E" . PHP_EOL
};

echo $re;


// Match Expression dengan kondisi
$name = "Mrs. Eko";

$hasil = match (true) {
    str_contains($name, "Mr.") => "Hello Mr. ", //Bernilai boolean
    str_contains($name, "Mrs.") => "Hello Mrs. ", //Bernilai boolean
    default => "Hello"
};
echo $hasil;
