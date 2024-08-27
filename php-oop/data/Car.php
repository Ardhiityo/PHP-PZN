<?php

namespace Data;

interface HasBrand
{
    function getBrand(): string;
}

// Interface tidak bisa extends dengan class, harus sesama interface dan booleh lebih dari 1
interface IsMaintenance
{
    function isMaintenance(): bool;
}

// Interface sama seperti extends, namun pada interface, class turunannya bisa memiliki banyak interface
interface Car extends HasBrand, IsMaintenance
{
    function drive(): void;
    function getTire(): int;
}

class Avanza implements Car
{
    function drive(): void
    {
        echo "Drive Avanza" . PHP_EOL;
    }

    function getTire(): int
    {
        return  4;
    }

    function getBrand(): string
    {
        return "Toyota";
    }

    function isMaintenance(): bool
    {
        return false;
    }
}
