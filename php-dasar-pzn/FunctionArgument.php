<?php

function sayHello($name)
{
    echo "Hello $name";
}

sayHello("Eko");

echo PHP_EOL;

// Dengan default parameter
function sayHai($name = "Reza")
{
    echo "Hello $name";
}

sayHai();

echo PHP_EOL;

// Type Declaration
// Mengharuskan tipe data yg dikirim adalah integer, dan bisa yg lain seperti float, dan string
function getValue(int $a, int $b)
{
    echo "$a dan $b";
}

// Jika true maka dikonversi menjadi 1, dan false dikonversi jadi 0
getValue(true, false);

echo PHP_EOL;

// String akan dikonversi menjadi numberr apabila string angka
getValue("2", "3");

// Jika Array maka akan error
// getValue([], []);

echo PHP_EOL;

// Variable-length Argument List
function example(...$values)
{
    $sum = 0;
    foreach ($values as $value) {
        $sum += $value;
    }
    // Implode adalah cara untuk merubah array menjadi strring
    echo "Total " . implode(',', $values) . " = $sum";
}

// Akan dikonversi emnjadi Array
example(10, 20, 30, 40);

echo PHP_EOL;

// Jika nilai Array yg dikirim maka harus menggunakan ...
example(...[10, 20, 30, 40]);
