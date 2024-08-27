<?php

class Data implements IteratorAggregate
{
    var string $first = "One";
    public string $second = "Two";
    private string $third = "Three";
    protected string $fourth = "Four";

    public function getIterator(): Traversable
    {

        // Cara 1
        // $array = [
        //     "first" => $this->first,
        //     "second" => $this->second,
        //     "third" => $this->third,
        //     "fourth" => $this->fourth
        // ];

        // return new ArrayIterator($array);

        // Cara 2
        yield "first" => $this->first;
        yield "second" => $this->second;
        yield "third" => $this->third;
        yield "fourth" => $this->fourth;
    }
}

$data = new Data();
foreach ($data as $property => $value) {
    echo "$property : $value" . PHP_EOL;
}
