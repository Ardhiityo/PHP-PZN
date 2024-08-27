<?php

class ParentClass
{
    public function method(array $a)
    {
        echo "Parent";
    }
}

class ChildClass extends ParentClass
{
    // Error
    // public function method(string $a)
    // {
    //     echo "Child";
    // }
}
