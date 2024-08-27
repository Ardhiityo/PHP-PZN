<?php

$timezone = new DateTime();
var_dump($timezone);

$timezone->setTimezone(new DateTimeZone('America/New_York'));
var_dump($timezone);

// Format Datetime menjadi string
// tahun, bulan, tanggal, jam, menit, detik
echo "Waktu saat ini (America) : " . $timezone->format('Y-m-d H:i:s') . PHP_EOL;


// Parse Datetime
// Jika tidak set timezone maka akan menggunakan timezone default
$date = DateTime::createFromFormat('Y-m-d H:i:s', '2020-10-10 10:10:10', new DateTimeZone('Asia/Jakarta'));
var_dump($date);

// Jika salah
$date = DateTime::createFromFormat('Y-m-d H:i:s', 'Salah', new DateTimeZone('Asia/Jakarta'));
var_dump($date);

if ($date) {
    echo "Berhasil" . PHP_EOL;
} else {
    echo "Gagal" . PHP_EOL;
}
