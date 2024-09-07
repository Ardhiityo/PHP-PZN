<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

$sql = "SELECT id, name, email FROM customers";
$statement = $connections->query($sql);
$connections = null;

foreach ($statement as $key => $value) {
    echo "Id : " . $value['id'] .
        ", Name : " . $value['name'] .
        ", Email : " . $value['email'] .
        PHP_EOL;
}
