<?php

$nilai = 70;
$absensi = 90;

// If Statement cara 1
if ($nilai >= 70 && $absensi >= 70) {
    echo "Selamat Anda Lulus" . PHP_EOL;
}

// If Statement cara 2
if ($nilai >= 70 && $absensi >= 70)
    echo "Selamat Anda Lulus" . PHP_EOL;

// Else Statement
if ($nilai >= 70 && $absensi >= 70) {
    echo "Selamat Anda Lulus" . PHP_EOL;
} else {
    echo "Maaf Anda Tidak Lulus" . PHP_EOL;
}

// Else If Statement cara 1
if ($nilai > 80 && $absensi >= 70) {
    echo "Selamat Anda Lulus" . PHP_EOL;
} else if ($nilai >= 70 && $absensi >= 70) {
    echo "Selamat Anda Luluss" . PHP_EOL;
} else {
    echo "Maaf Anda Tidak Lulus" . PHP_EOL;
}

// Else If Statement cara 2
if ($nilai > 80 && $absensi >= 70) {
    echo "Selamat Anda Lulus" . PHP_EOL;
} elseif ($nilai >= 70 && $absensi >= 70) {
    echo "Selamat Anda Luluss" . PHP_EOL;
} else {
    echo "Maaf Anda Tidak Lulus" . PHP_EOL;
}


//  else if dengan colon
// jika menggunakan dengan colon, harus menggunakan elseif, bukan else if
if ($nilai > 80 && $absensi >= 70) :
    echo "Selamat Anda Lulus" . PHP_EOL;
elseif ($nilai >= 70 && $absensi >= 70) :
    echo "Selamat Anda Luluss" . PHP_EOL;
else :
    echo "Maaf Anda Tidak Lulus" . PHP_EOL;
endif;
