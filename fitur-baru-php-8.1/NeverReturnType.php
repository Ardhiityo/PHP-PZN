<?php

function returnNothing(): never
{
    echo "I am never going to return anything";
    exit();
}

returnNothing();

echo "Hai" . PHP_EOL;
