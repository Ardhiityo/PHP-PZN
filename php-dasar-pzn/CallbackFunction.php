<?php

// Callback adalah sebuah mekanisme sebuah function memanggil function lainnya sesuai dengan yang diberikan di argument
// Hal ini sebenarnya sudah kita lakukan di materi Variable Function dan Anonymous Function
// Namun di PHP ada cara lain untuk implementasi callback, yaitu menggunakan tipe data callable
// Dan untuk memanggil callback function tersebut, kita bisa menggunakan function call_user_func(callable, arguments)

// Cara 1
function callback(string $name, callable $callback)
{
    $fullName = call_user_func($callback, $name);
    echo $fullName;
}

callback("Eko", "strtoupper");

echo PHP_EOL;

callback("Eko", fn($name) => strtolower($name));

echo PHP_EOL;

callback("Eko", function ($name) {
    return strtolower($name);
});

echo PHP_EOL;

callback("Eko", function ($name): string {
    return strtolower($name);
});

echo PHP_EOL;

// Cara 2 (Tanpa menggunakan call_user_func)
function callbacks(string $name, callable $callback)
{
    $fullName = $callback($name);
    echo $fullName;
}

callback("Eko", "strtoupper");
