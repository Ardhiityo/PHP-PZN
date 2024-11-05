<?php

require_once "Customer.php";

trait InIndonesia
{
    function inIndonesia(): string
    {
        return match ($this) {
            Gender::Male => "Tuan",
            Gender::Female => "Nyonya",
        };
    }
}

interface SayHello
{
    public function say();
}

enum Gender: string implements SayHello
{

    use InIndonesia;

    case Male = "Mr.";
    case Female = "Mrs.";
    const Unknown = "Unknown";

    function say(): string
    {
        return "Hello $this->value" . PHP_EOL;
    }

    static function fromIndonesia($value): Gender
    {
        return match ($value) {
            "Bapak" => Gender::Male,
            "Ibu" => Gender::Female,
            default => throw new Exception("Not supported"),
        };
    }
}

// Mengambil semua enum
var_dump(Gender::cases());

// var_dump($customer->gender); //enum(Enum\Gender::Male)

function sayHello(Customer $customer): void
{
    if ($customer->gender != null) {
        echo "Hello {$customer->gender->value} $customer->name" . PHP_EOL;
    } else {
        echo "Hello $customer->name" . PHP_EOL;
    }
}

// Cara 1
// sayHello(new Customer(uniqid(), "Eko", Gender::Male));

// sayHello(new Customer(uniqid(), "Shinta", Gender::Female));

// sayHello(new Customer(uniqid(), "Shinta", null));

// Cara 2
sayHello(new Customer(uniqid(), "Eko", Gender::from("Mr.")));

sayHello(new Customer(uniqid(), "Shinta", Gender::from("Mrs.")));

// Jika menggunakan tryfrom yang tidak memiliki nilai pada enum gender, maka akan bernilai null
sayHello(new Customer(uniqid(), "Shinta", Gender::tryFrom("Salah")));


// Jika menggunakan from yang tidak memiliki nilai pada enum gender, maka akan bernilai error
// sayHello(new Customer(uniqid(), "Shinta", Gender::From("Salah")));


echo Gender::Male->say();
echo Gender::Female->say();

echo Gender::Male->inIndonesia() . PHP_EOL;
echo Gender::Female->inIndonesia() . PHP_EOL;

var_dump(Gender::fromIndonesia("Bapak"));
var_dump(Gender::fromIndonesia("Ibu"));
// var_dump(Gender::fromIndonesia("Salah"));

var_dump(Gender::Unknown);
