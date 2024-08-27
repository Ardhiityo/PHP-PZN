<?php

$name = "John"; //global scope error

function sayHello()
{
    // Variabel yg ada disini adalah local scope
    // echo $name; //error karena variable tidak dapat diakses di luar function

    $tes = "Eko";
}
sayHello();

// Akan error
// echo $tes;


// Global keyword

$name2 = "Budi";

function sayHello2()
{
    global $name2;
    echo $name2;
}

sayHello2();


// Setiap variable global yg dibuat akan tersimpan di dalam varriabel yang bernama $GLOBALS

var_dump($GLOBALS);
echo $GLOBALS["name2"];
