<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

// Memulai transaction
$connections->beginTransaction();

// Jika ada 1 proses yang gagal, maka semua proses akan di rollback
$connections->exec("INSERT INTO comments(email, comment) VALUES ('contoh1@gmail.com', 'contoh')");
$connections->exec("INSERT INTO comments(email, comment) VALUES ('contoh2s@gmail.com', 'contoh')");

$connections->rollBack();

$connections = null;
