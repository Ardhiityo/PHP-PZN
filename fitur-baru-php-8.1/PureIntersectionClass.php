<?php

interface hasBrand
{
    public function getBrand();
}

interface hasName
{
    public function getName();
}

class Car implements hasBrand, hasName
{

    private string $brand;
    private string $name;

    public function __construct(string $brand, string $name)
    {
        $this->brand = $brand;
        $this->name = $name;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getName()
    {
        return $this->name;
    }
}

function printNameAndBrand(hasName & hasBrand $value)
{
    echo $value->getName() . "-" . $value->getBrand();
}

printNameAndBrand(new Car("Toyota", "Avanza"));
