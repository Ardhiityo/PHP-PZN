<?php

// Secara default, visibility dari class semuanya adalah public

class Product
{
    private string $name;
    protected int $price;

    // Tanpa public pun, secara default visibility adalah public
    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}


class ProductDummy extends Product
{
    public function info()
    {
        // Error karena turunan dari class Product pun tidak bisa mengakses parent nya
        // echo "Name $this->name" . PHP_EOL;

        // Namun jika visibilitynya protected, maka bisa mengakses parentnya
        echo "Name $this->price" . PHP_EOL;
    }
}
