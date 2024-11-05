<?php

class Category
{
    /**
     * Readonly tidak bisa diubah nilainya
     * Tidak bisa diset melalui default value
     */
    // public readonly string $id = "jsjss";

    /**
     * Readonly hanya bisa diset pada constructor saja jika memiliki property (tidak menggunakan promoted contructor)
     * Bisa juga digunakan kedalam promoted constructor
     */
    public function __construct(public readonly string $id, public readonly string $name) {}


    // Tidak bisa diset melalui setter
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}

$category = new Category(uniqid(), "Eko");
// $category->setName("Eko");
echo $category->getName() . PHP_EOL;
