<?php

trait SampleTrait
{
    public abstract function sampleFunction(string $name): string;
}

class SampleClass
{
    // use SampleTrait;

    // Error
    // public function sampleFunction(int $name): int {}
}
