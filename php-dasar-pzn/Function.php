<?php

function get_name($name)
{
    echo "Hello $name";
}

get_name("John");

echo PHP_EOL;


$condition = false;

if ($condition) {
    function get_number($number)
    {
        echo $number;
    }
}

// Ini akan error, karena variabel condition false, maka function get_number tidak akan terdefinisi
// get_number(10);
