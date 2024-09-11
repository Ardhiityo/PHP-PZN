<?php
// Jika inline maka browser akan merender saja
// header("Content-Disposition: inline");

// Cara 1
// Jika attachment, browser akan memaksa untuk mendownload file
// header("Content-Disposition: attachment");

// Cara 2 memberi nama file yang akan di download
// Jika attachment, browser akan memaksa untuk mendownload file
// header("Content-Disposition: attachment; filename=tes.php");

// Cara 3, mendownload file gambar dengan pengecekan query
if (isset($_GET["key"]) && $_GET["key"] == "eko") {
    header("Content-Disposition: attachment; filename=Gambar.png");

    // Optional, jika tidak di set maka browser akan menentukan tipe file berdasarkan extension
    // header("Content-Type: image/png");

    readfile(__DIR__ . '/file/ss.png');
    exit();
} else {
    echo "Anda tidak berhak mengakses halaman ini";
    exit();
}
