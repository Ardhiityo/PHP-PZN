<?php

$nilai = 80;

// Cara 1
switch ($nilai) {
    case 100:
        echo "Sangat Baik";
        break;
    case 80:
        echo "Baik";
        break;
    case 60:
        echo "Cukup";
        break;
    default:
        echo "Tidak Ada";
        break;
}

echo PHP_EOL;

// Cara 2
switch ($nilai) {
    case 100:
    case 80:
        echo "Sangat Baik";
        break;
    case 60:
        echo "Cukup";
        break;
    default:
        echo "Tidak Ada";
        break;
}

echo PHP_EOL;

// Cara 3
switch ($nilai):
    case 100:
    case 80:
        echo "Sangat Baik";
        break;
    case 60:
        echo "Cukup";
        break;
    default:
        echo "Tidak Ada";
        break;
endswitch;
