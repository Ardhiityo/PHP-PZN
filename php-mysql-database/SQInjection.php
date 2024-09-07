<?php

require_once __DIR__ . '/GetConnections.php';

$connections = getConnection();

// Salah
// $name = "admin'; #";
// $pw = "salah ga peduli";

// Benar
$name = $connections->quote("admin'; #");
$pw = $connections->quote("salah ga peduli");

$sql = <<<SQL
    SELECT * FROM admin WHERE name = $name AND password = $pw;
    SQL;

echo $sql . PHP_EOL;


$statement = $connections->query($sql);
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
