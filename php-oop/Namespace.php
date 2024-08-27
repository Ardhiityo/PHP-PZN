<?php

// Secara default saat kita membuat kode di PHP sebenarnya itu disimpan di global namespace
// Global namespace adalah namespace yang tidak memiliki nama namespace

// Secara default seperti ini, namun tidak wajib menggunakan namespace
namespace {
    require_once "data/Conflict.php";
    require_once "data/Helper.php";

    // Membuat object dari namespace cara 1
    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\Two\Conflict();

    // Membuat object dari namespace cara 2
    // $conflict1 = new \Data\One\Conflict();
    // $conflict2 = new \Data\Two\Conflict();

    // Mengakses namespace helper
    echo Helper\APPLICATION . PHP_EOL;
    Helper\helpMe();
}
