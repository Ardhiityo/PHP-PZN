<?php

class Zero
{

    // Properties Overloading

    // Ketika property ada, maka ini yg akan diakses
    // public string $firstName = "Ardhi";

    private array $properties = [];

    public function __get($name)
    {
        // Ini akan dijalankan ketika mengakses property yang tidak ada
        // return "Access property $name" . PHP_EOL;

        return $this->properties[$name];
    }

    public function __set($name, $value)
    {
        // Ini akan dijalankan ketika membuat sebuah property yg tidak ada
        // echo "Set property $name with value $value" . PHP_EOL;

        return $this->properties[$name] = $value;
    }

    public function __isset($name): bool
    {
        // echo "Isset $name" . PHP_EOL;

        return isset($this->properties[$name]);
    }

    public function __unset($name)
    {
        // echo "Unset $name" . PHP_EOL;

        unset($this->properties[$name]);
    }


    // Function Overloading
    public function __call($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "Call function $name with arguments $join" . PHP_EOL;
    }

    public static function __callStatic($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "Call static function $name with arguments $join" . PHP_EOL;
    }
}

$zero = new Zero();

// Properties Overloading

// Akan menjalankan function __set
$zero->firstName = "Eko";
$zero->middleName = "Kurniawan";
$zero->lastName = "Khannedy";

echo "First Name : $zero->firstName" . PHP_EOL;
echo "Middle Name : $zero->middleName" . PHP_EOL;
echo "Last Name : $zero->lastName" . PHP_EOL;

// Akan menjalankan function __isset
isset($zero->firstName);

// Akan menjalankan function __unset
unset($zero->firstName);


// Function Overloading
$zero->sayHello("Eko", "Kurniawan", "Khannedy");
Zero::sayHello("Eko", "Kurniawan", "Khannedy");
