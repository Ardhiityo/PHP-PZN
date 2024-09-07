<?php

$host = "localhost";
$port = 3306;
$database = "belajar_php_database";
$user = "root";
$pass = "";


try {
    $connection = new PDO("mysql:host=$host:$port;dbname=$database", $user, $pass);
    echo "Sukses terkoneksi ke database MySQL" . PHP_EOL;

    // Menutup Koneksi
    $connection = null;
} catch (PDOException $exception) {
    echo "Gagal terkoneksi ke database MySQL : " . $exception->getMessage() .  PHP_EOL;
}
