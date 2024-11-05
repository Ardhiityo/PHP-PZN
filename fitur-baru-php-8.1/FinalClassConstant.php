<?php

class FinalClassConstant
{
    public final const AUTHOR = "Arya";
}

class Child extends FinalClassConstant
{
    // error
    // public const AUTHOR = "Pzn";
}

// error
// echo Child::AUTHOR;

echo FinalClassConstant::AUTHOR;
