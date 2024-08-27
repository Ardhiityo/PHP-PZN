<?php

$dateTime = new DateTime();
var_dump($dateTime);

// Tahun, Bulan, Tanggal
$dateTime->setDate(2001, 10, 10);
var_dump($dateTime);

// Jam, Menit, Detik, Micro Second
$dateTime->setTime(10, 10, 10, 0);
var_dump($dateTime);
