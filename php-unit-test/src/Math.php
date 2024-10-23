<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

class Math
{
    public static function sum(...$data): int
    {
        $total = 0;
        foreach ($data as $value) {
            $total += $value;
        }
        return $total;
    }
}
