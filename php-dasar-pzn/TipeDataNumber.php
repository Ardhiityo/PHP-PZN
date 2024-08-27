<?php

echo "Tipe data Integer \n";

// var__dump() untuk mengetahui tipe data;

// Decimal
echo "Decimal : ";
var_dump(1234);

// Octal 0-8
echo "Octal : ";
var_dump(0234);

// Hexadecimal
echo "Hexadecimal : ";
var_dump(0x1234);

// Binary
echo "Binary : ";
var_dump(0b1111);

// Underscore in number
echo "Underscore : ";
var_dump(1_234_567);


echo "Tipe data Floating Point \n";

var_dump(1.234);

echo "Floating Point dengan E notation plus (1.2 x 1000) : ";
var_dump(1.2e3);

echo "Floating Point dengan E notation min (7 x 0.001) : ";
var_dump(7e-3);

echo "Underscore di Floating Point : ";
var_dump(1_234.567);


echo "Tipe data Integer Overflow \n";

echo "Belum melebihi batas : ";
var_dump(9223372036854775807);

echo "Melebihi batas : ";
var_dump(9223372036854775808);
