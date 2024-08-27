<?php

function testMixed(mixed $a): mixed
{
    if (is_string($a)) {
        return "string " . $a . PHP_EOL;
    } else if (is_int($a)) {
        return "int " . $a . PHP_EOL;
    } else if (is_array($a)) {
        return $a;
    } else {
        return null . PHP_EOL;
    }
}

echo testMixed("Ardhi");
echo testMixed(100);
var_dump(testMixed([1, 2, 3]));
echo testMixed(true);
