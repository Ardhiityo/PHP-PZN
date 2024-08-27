<?php

function sayHello(string $name): void
{
    echo "Hello $name" . PHP_EOL;
}

sayHello("Ardhi",);

function sum(int ...$values): int
{
    $total = 0;
    foreach ($values as $value) {
        $total += $value;
    }
    return $total;
}

echo sum(1, 2, 3, 4, 5,);
