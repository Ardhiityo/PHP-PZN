<?php

class Manager
{
    private function test() {}
}

class VicePresident extends Manager
{
    // Di php 7 function private akan di overide oleh function child dengan nama yg sama sekalipun itu private, namun di php 8 tidak akan di overide
    public function test(string $name)
    {
        echo "Hello $name" . PHP_EOL;
    }
};

(new VicePresident())->test("Ardhi");
