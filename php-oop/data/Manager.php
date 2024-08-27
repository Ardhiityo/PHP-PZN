<?php

class Manager
{
    var string $name;
    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    // Void adalah jika tidak memiliki kembalian dari function
    function sayHelloo(string $name): void
    {
        echo "Hello $name, my name is Manager $this->name";
    }
}

// Dengan extends akan membuat VicePresident memiliki semua property dan function dari Manager
class VicePresident extends Manager
{

    // Constructor Overriding
    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        return  parent::__construct($name, "VP");
    }

    // Jika mengoverride function ke parent, pastikan function turunannya memilliki arrgument dengan jumlah yg sama, jika tidak, tidak error namun menampilkan pesan warning
    function sayHelloo(string $name): void
    {
        echo "Hello $name, my name is VP $this->name";
    }
}
