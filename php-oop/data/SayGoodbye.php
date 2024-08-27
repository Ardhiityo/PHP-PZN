<?php

namespace Data;

trait SayGoodbye
{
    public function goodBye(?string $name): void
    {
        if (is_null($name)) {
            echo "Good bye" . PHP_EOL;
        } else {
            echo "Good bye $name" . PHP_EOL;
        }
    }
}

trait SayHello
{
    public function hello(?string $name): void
    {
        if (is_null($name)) {
            echo "Hello" . PHP_EOL;
        } else {
            echo "Hello $name" . PHP_EOL;
        }
    }
}

trait hastName
{
    public string $name;
}

trait canRun
{
    // Abstract menandakan bahwa turunannya harus menggunakan function ini
    public abstract function run(): void;
}

class ParentPersson
{
    // Namun jika pada class Person memiliki parent class ParenttPersson, maka function hello dan goodBye pada class Person akan di override oleh function hello dan goodBye pada trait

    // Ini akan di override olleh trait
    public function hello(?string $name): void
    {
        if (is_null($name)) {
            echo "Hello" . PHP_EOL;
        } else {
            echo "Hello $name" . PHP_EOL;
        }
    }
    public function goodBye(?string $name): void
    {
        if (is_null($name)) {
            echo "Good bye" . PHP_EOL;
        } else {
            echo "Good bye $name" . PHP_EOL;
        }
    }
}

trait All
{
    use SayGoodbye, SayHello, hastName, canRun {
        //  Trait visibility override (Visibility berubah jadi bersifat private)
        // hello as private;
        // goodBye as private;
    }
}

// Pada trait bisa menambahkan prorperty, contohnya name pada trait hasName;
class Person extends ParentPersson
{
    // Trait inheritance
    use All;

    // Trait Abstract Function
    public function run(): void
    {
        echo "Person $this->name is running" . PHP_EOL;
    }

    // Jika pada trait memiliki functio yg ssama pada class, maka yang dijalankan adalah function pada class
    // public function hello(?string $name): void
    // {
    //     if (is_null($name)) {
    //         echo "Hello in Person" . PHP_EOL;
    //     } else {
    //         echo "Hello Person $name" . PHP_EOL;
    //     }
    // }
    // public function goodBye(?string $name): void
    // {
    //     if (is_null($name)) {
    //         echo "Good bye Person" . PHP_EOL;
    //     } else {
    //         echo "Good bye Person $name" . PHP_EOL;
    //     }
    // }
}
