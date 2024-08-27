<?php

// Tipe data harruss bersifat Integer
function sum(int $a, int $b)
{
    // Return hanya bisa menghasilkan 1 data;
    return $a + $b;
}

echo sum(1, 2);

echo PHP_EOL;

// Function Return value 2
function test(int $value)
{
    if ($value > 85) {
        return "A";
    } else if ($value > 70) {
        return "B";
    } else {
        return "C";
    }

    echo "Ini tidak akan di eksekusi";
}

echo test(80);

echo PHP_EOL;


// Return Type Declarations
// Kita bisa men set bahwa suatu return harus bernilai suatu tipe data tertentu
function type(int $a, int $b): int
{
    $sum = $a + $b;
    return $sum;
}

var_dump(type(5, 5));

// Return Type Declarations 2
function testing(int $value): string
{
    if ($value > 85) {
        return "A";
    } else if ($value > 70) {
        return "B";
    } else {
        // Jika disengaja diubah menjadi integer, maka secara langsung akan dikonversi menjadi string karena memiliki sifat type jugling
        return 1;
    }

    echo "Ini tidak akan di eksekusi";
}

var_dump(testing(20));


// Variable Function
// Variable function adalah kemampuan memanggil sebuah function dari value yang terdapat di sebuah variable

function sayHai($name)
{
    echo "Hello $name";
}

$functionSayHai = "sayHai";
$functionSayHai("Eko");

echo PHP_EOL;

// Variable Function
function sayHello(string $name, $filter): string
{
    $finalName = $filter($name);
    return $finalName;
}

var_dump(sayHello("Eko", "strtoupper"));
var_dump(sayHello("Eko", "strtolower"));

// Variabel Function
function greetings(string $name, $filter): string
{
    $finalName = $filter($name);
    return $finalName;
}

function sample(string $name): string
{
    return "Hello sample $name";
}

var_dump(greetings("Eko", "sample"));
