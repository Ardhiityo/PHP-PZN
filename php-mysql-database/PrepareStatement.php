<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

// Login Failed
// $name = "admin'; #";
// $pw = "salah ga peduli";

// Successs
$name = "admin";
$pw = "admin";

$sql = "SELECT * FROM admin WHERE name = :name AND password = :pw;";

echo $sql . PHP_EOL;

$statement = $connections->prepare($sql);
$statement->bindParam("name", $name);
$statement->bindParam("pw", $pw);
$statement->execute();

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
