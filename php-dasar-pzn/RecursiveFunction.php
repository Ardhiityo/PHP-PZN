<?php

function recursiveFunction($number): int
{
    if ($number === 0) :
        return 0;
    endif;
    return $number + recursiveFunction($number - 1);
}

echo recursiveFunction(10);

// 10 + 9
// 19 + 8
// 27 + 7
// 34 + 6
// 40 + 5
// 45 + 4
// 49 + 3
// 52 + 2
// 54 + 1
// 55 + 0
// 55

echo PHP_EOL;

function factorial($number): int
{
    $total = 0;
    for ($i = 1; $i <= $number; $i++) {
        $total += $i;
    }
    return $total;
}

echo factorial(10);
// 0 + 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9 + 10


// Jika recursive terlalu dalam, maka  akan ada kemungkinan  terjadi memory overflow, yaitu error dimana memory terlalu banyak digunakan di PHP
// Kenapa problem ini  bisa terjadi? Karena ketika kita memanggil function, PHP akan menyimpannya dalam stack, jika function tersebut memanggil function lain, maka stack akan menumpuk terus, dan jika terlalu banyak, maka akan membutuhkan konsumsi memory besar, jika sudah melewati batas, maka akan terjadi error memory

function loop($number)
{
    if ($number === 0) {
        echo "End Loop";
    } else {
        echo "Loop-$number" . PHP_EOL;
        loop($number - 1);
    }
}
// loop(3000000);
