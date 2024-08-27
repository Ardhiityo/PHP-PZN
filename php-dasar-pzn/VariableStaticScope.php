<?php


// Jika tanpa static, maka siklus hidupnya hanya pada saat function tersebut dipanggil lalu selesai
function increment()
{
    $counter = 1;
    echo $counter;
    $counter++;
}

// Akan selalu berrnilai 1
increment();
increment();
increment();


echo PHP_EOL;

// Dengan Static, maka siklus hidupnya akan selalu ada
function incrementStatic()
{
    static $counter = 1;
    echo $counter;
    $counter++;
}

// Akan bertambah
incrementStatic();
incrementStatic();
incrementStatic();
