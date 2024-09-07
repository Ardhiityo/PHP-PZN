<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

$sql = "SELECT * FROM admin";

$data = $connections->query($sql);

// Jika menggunakan fetch akan menarik data ssecara 1 per 1
// var_dump($data->fetch());

// Jika menggunakan fetch all akan menarik semua data sekaligus
// var_dump($data->fetchAll());

foreach ($data->fetchAll() as $key => $row) {
    echo "$key : $row[$key]" . PHP_EOL;
}

$connections = null;
