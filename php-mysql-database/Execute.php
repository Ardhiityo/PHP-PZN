<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

$sql =
    <<<SQL
    INSERT INTO customers(id, name, email) 
    VALUES ("C002", "Khannedy", "Khanendy@gmail.com");
    SQL;

$connections->exec($sql);
$connections = null;
