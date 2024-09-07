<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

$sql = "INSERT INTO comments (email, comment) VALUES ('eko3gmail.com', 'This is a test comment')";

$connections->exec($sql);
$id = $connections->lastInsertId();

var_dump($id);


$connections = null;
