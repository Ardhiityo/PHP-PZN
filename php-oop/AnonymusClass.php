<?php


// Sebelum Anonymus Class

// interface HelloWorld
// {
//     function sayHello(): string;
// }

// class SampleHelloWorld implements HelloWorld
// {
//     public function sayHello(): string
//     {
//         return "Hello World";
//     }
// }

// $helloWorld = new SampleHelloWorld();
// echo $helloWorld->sayHello() . PHP_EOL;


// Dengan Anonymus Class
// interface HelloWorld
// {
//     function sayHello(): string;
// }

// $helloWorld = new class() implements HelloWorld {
//     public function sayHello(): string
//     {
//         return "Hello World";
//     }
// };

// echo $helloWorld->sayHello();


// Anonymus Class dengan constructor
interface HelloWorld
{
    function sayHello(): string;
}

$helloWorld = new class("Anonymus Class") implements HelloWorld {

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHello(): string
    {
        return "Hello $this->name";
    }
};

echo $helloWorld->sayHello();
