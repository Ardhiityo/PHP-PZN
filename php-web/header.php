<?php

// Untuk menambahkan header pada HTTP response
header("Application : Belajar PHP WEB");
header("Author : Eko Kurniawan Khannedy");

// Untuk menangkap header yang bernama HTTP_CLIENT_NAME dari server, dan jika itu header maka awalanya pasti diawali dengan HTTP, serta symbol akan diubah menjadi underscore
$client = $_SERVER['HTTP_CLIENT_NAME'];

echo "Hello " . $client;
