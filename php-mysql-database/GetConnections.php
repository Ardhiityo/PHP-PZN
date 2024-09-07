<?php


function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "belajar_php_database";
    $user = "root";
    $pass = "";
    return new PDO("mysql:host=$host:$port;dbname=$database", $user, $pass);
}
