<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;
use Programmerzamannow\BelajarPhpUnitTest\Person;
use Exception;

class PersonTest extends TestCase
{
    private Person $person;

    public function setUp(): void
    {
        $this->person = new Person("Eko");
    }

    // This method is called after each test.
    // public function tearDown(): void
    // {
    //     echo "Tear Down" . PHP_EOL;
    // }

    public function testSuccess()
    {
        self::assertEquals("Hello Budi, my name is Eko", $this->person->sayHello("Budi"));
    }

    public function testException()
    {
        self::expectException(Exception::class);
        $this->person->sayHello(null);
    }

    public function testGoodBye()
    {
        self::expectOutputString("Good bye Budi");
        $this->person->sayGoodBye("Budi");
    }
}
