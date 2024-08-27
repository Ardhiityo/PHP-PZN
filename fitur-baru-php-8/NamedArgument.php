<?php


function sayHello(string $firstName, string $middleName, string $lastName): void
{
    echo "Hello $firstName $middleName $lastName" . PHP_EOL;
}

// without named argument
sayHello("Ardhi", "Yudha", "Pratama");

// with named argument
sayHello(
    lastName: "Pratama",
    middleName: "Yudha",
    firstName: "Ardhi"
);

function sayHai(string $firstName, string $middleName = "", string $lastName): void
{
    echo "Hello $firstName $middleName $lastName" . PHP_EOL;
}

// Error
// sayHello("Ardhi", "Pratama");

// Success
sayHai(
    lastName: "Pratama",
    firstName: "Ardhi"
);
