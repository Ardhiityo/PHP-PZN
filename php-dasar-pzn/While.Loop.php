<?php

// Cara 1
$value = 0;
while ($value < 10) {
    echo "Hello World\n";
    $value++;
};

// Cara 2
$value = 0;
while ($value < 10) :
    echo "Hello World\n";
    $value++;
endwhile;
