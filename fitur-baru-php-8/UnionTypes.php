<?php

class Example
{
    public string|int|bool|array $data;
}

$example = new Example();
$example->data = "Ardhi";
$example->data = 100;
$example->data = true;
$example->data = [1, 2, 3, 4, 5];
var_dump($example);

function sampleFunction(string|array $data): string | array
{
    if (is_string($data)) {
        return "String" . PHP_EOL;
    } else if (is_array($data)) {
        return ["This is Array"];
    }
}

echo sampleFunction("Ardhi");
echo implode(", ", sampleFunction([1, 2, 3, 4, 5]));
