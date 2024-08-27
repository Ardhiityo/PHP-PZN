<?php

// Tanpa menggunakan constructor property promotion
class Product
{
    public string $id;
    public string $name;
    public int $price;
    public int $quantity;

    public function __construct(string $id, string $name, int $price, int $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

// Menggunakan constructor property promotion
class Products
{
    public function __construct(public string $id, public string $name, public int $price, public int $quantity) {}
}

$products = new Products(id: "1", name: "Mie Ayam", price: 15000, quantity: 100);
var_dump($products);
echo $products->name;
