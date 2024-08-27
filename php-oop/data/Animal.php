<?php

require_once "Food.php";

use Data\{Food, AnimalFood};

abstract class Animal
{
    public string $name;

    // Abstract function tidak boleh bersifat private
    // Abstract function tidak boleh memilliki body
    // Abstract hanya bissa digunakan apabila class sudah mengisialisasi abstract pada Class
    public abstract function run(): void;

    public abstract function eat(AnimalFood $animalFood): void;
}

class Cat extends Animal
{
    // Turunan pada abstract function dari parent harus secara dipaksa menggunakan function yang sama pada parent (override function di parent)
    // Setiap Class turunan wajib meeng-override function yg ada pada parent 
    public function run(): void
    {
        echo "Cat $this->name is running" . PHP_EOL;
    }

    public function eat(AnimalFood $animalFood): void
    {
        echo "Cat is eating" . PHP_EOL;
    }
}

class Dog extends Animal
{
    public function run(): void
    {
        echo "Dog $this->name is running" . PHP_EOL;
    }

    public function eat(Food $animalFood): void
    {
        echo "Dog is eating" . PHP_EOL;
    }
}
