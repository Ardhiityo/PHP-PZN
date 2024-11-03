<?php

function getConnection(): array {
    return [
      "tests" => [
        "url" => "mysql:host=localhost:3306;dbname=login_management_tests",
        "username" => "root",
        "password" => ""
    ],
    "production" => [
        "url" => "mysql:host=localhost:3306;dbname=login_management",
        "username" => "root",
        "password" => ""
        ]
    ];
}