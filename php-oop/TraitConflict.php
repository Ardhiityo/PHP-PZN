<?php


trait A
{
    function doA()
    {
        echo "a" . PHP_EOL;
    }
    function doB()
    {
        echo "b" . PHP_EOL;
    }
}

trait B
{
    function doA()
    {
        echo "A" . PHP_EOL;
    }
    function doB()
    {
        echo "B" . PHP_EOL;
    }
}

class Sample
{
    use A, B {
        // Untuk trait a pakai dari doB, bukan dari trait B (b)
        A::doB insteadof B;
        // Untuk trait b pakai dari doA, bukan dari trait A ()
        B::doA insteadof A;
    }
}

$sample = new Sample();
$sample->doA();
$sample->doB();
