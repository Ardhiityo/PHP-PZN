<?php

function sayHello(Stringable $stringable): void
{
    echo  "Hello {$stringable->__toString()}";
}

class Foo
{
    // Wajib impelemt Stringable
    public function __toString(): string
    {
        return "Foo";
    }
}

sayHello(new Foo);
