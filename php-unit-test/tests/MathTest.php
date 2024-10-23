<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;
use Programmerzamannow\BelajarPhpUnitTest\Math;

class MathTest extends TestCase
{
    public function testManual()
    {
        // self::assertEquals(5, Math::sum(...[2, 3]));
        self::assertEquals(5, Math::sum(2, 3));
    }

    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $data, $expected)
    {
        self::assertEquals($expected, Math::sum(...$data));
    }

    public function mathSumData(): array
    {
        return [
            [[], 0],
            [[100], 100],
            [[100, 200, 300], 600],
            [[100, 200, 300, 400], 1000],
        ];
    }

    /**
     * @testWith [[1,2,3,4,5], 15]
     * [[5,5], 10]
     */
    public function testWith(array $data, $expected)
    {
        self::assertEquals($expected, Math::sum(...$data));
    }
}
