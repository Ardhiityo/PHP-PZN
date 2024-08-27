<?php

$name = "Ardhi";

echo $name == "Ardhi" ? "Hello $name" . PHP_EOL : throw new Exception("Name is not Ardi");

function sayHelloExpression(?string $name)
{
    $res =  $name != null ? "Hello $name" . PHP_EOL : throw new Exception("Name is null");
    echo $res;
}

sayHelloExpression("Andi");
