<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

$name = "admin";
$pw = "admin";

$sql = "SELECT * FROM admin WHERE name = ? AND password = ?;";

echo $sql . PHP_EOL;

// Cara 1
// $statement = $connections->prepare($sql);
// $statement->bindParam(1, $name);
// $statement->bindParam(2, $pw);
// $statement->execute();

// Cara 2
$statement = $connections->prepare($sql);
$statement->execute([$name, $pw]);

$find_user = null;
$success = false;

foreach ($statement as $value) {
    $find_user = $value["name"];
    $success = true;
}

if ($success) {
    echo "Login Success, Welcome " . $find_user;
} else {
    echo "Login Failed";
}


$connections = null;
