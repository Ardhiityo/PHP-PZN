<?php

require_once "Enum.php";

class Customer
{
    public function __construct(public string $id, public string $name, public ?Gender $gender) {}
}
