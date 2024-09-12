<?php

namespace Pzn\BelajarMembuatLibrary;

class Customer
{
    public function __construct(private string $name) {}

    public function sayHello(string $name = "Guest"): string
    {
        return "Hello $name, my name is $this->name";
    }
}
