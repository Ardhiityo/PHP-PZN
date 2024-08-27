<?php
$sayHello = function (string $name) {
    echo "Hello $name";
};

$sayHello("Eko");

echo PHP_EOL;

// Anonymus Function sebagai argument
function sayGoodBye(string $name, $filter)
{
    $finalName = $filter($name);
    echo "Good bye $finalName" . PHP_EOL;
}

sayGoodBye("Eko", function (string $name): string {
    return strtoupper($name);
});

// Atau
function sayGoodByes(string $name, $filter)
{
    $finalName = $filter($name);
    echo "Good bye $finalName" . PHP_EOL;
}

$filter = function (string $name): string {
    return strtoupper($name);
};

sayGoodByes("Eko", $filter);


// Mengakses Variable di Luar Closure harus menggunakan use
$firstName = "Eko";
$lastName = "Kurniawan";

// Harus mendifinisikan nama variabel mana yang ingi diakses
$sayHelloEko = function () use ($firstName, $lastName) {
    echo "Hello $firstName $lastName" . PHP_EOL;
};
$sayHelloEko();



// Mengakses Variable di Luar Closure harus menggunakan use
$firstName = "Eko";
$lastName = "Kurniawan";

// Harus mendifinisikan nama variabel mana yang ingin diakses
$sayHelloEko = function () use ($firstName, $lastName) {
    echo "Hello $firstName $lastName" . PHP_EOL;
};
$sayHelloEko();

// Jika value variabel diubah, maka akan tetap mengambil variabel yg pertama
$firstName = "Budi";
$lastName = "Nugraha";
$sayHelloEko();
