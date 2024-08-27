<?php

class Person
{
    const AUTHOR = "Ardhiityo";

    var string $name;

    // ? menandakan bahwa properties boleh bernilai null;
    var ?string $address = null;

    var string $country = "Indonesia";

    function __construct(?string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    // Destructor adalah function yang akan dipanggil ketika object dihapus dari memory
    // Biasanya ketika object tersebut sudah tidak lagi digunakan, atau ketika aplikasi akan mati
    function __destruct()
    {
        echo "Object person $this->name is destroyed" . PHP_EOL;
    }

    function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

    function info()
    {
        echo "AUTHOR : " . self::AUTHOR . PHP_EOL;
    }
}
