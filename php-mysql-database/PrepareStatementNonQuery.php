<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

$name = "eko";
$pw = "rahasia";

$sql = "INSERT INTO admin(name, password) VALUES (?, ?);";

$statement = $connections->prepare($sql);
$statement->execute([$name, $pw]);

$connections = null;
