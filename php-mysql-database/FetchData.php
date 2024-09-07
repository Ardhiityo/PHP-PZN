<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

$name = "admin";
$pw = "admin";

$sql = "SELECT * FROM admin WHERE name = ? AND password = ?;";

$statement = $connections->prepare($sql);
$statement->execute([$name, $pw]);

$success = false;

if ($row = $statement->fetch()) {
    echo "Login Success, Welcome " . $row["name"];
} else {
    echo "Login Failed";
}


$connections = null;
