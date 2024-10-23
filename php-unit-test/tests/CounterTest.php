<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;
use Programmerzamannow\BelajarPhpUnitTest\Counter;

class CounterTest extends TestCase
{
    public function testIncrement()
    {
        $counter = new Counter();
        $counter->increment();
        self::assertEquals(1, $counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {
        $counter = new Counter();
        $counter->increment();
        self::assertEquals(1, $counter->getCounter());
    }

    public function testFirst(): Counter
    {
        $counter = new Counter();
        $counter->increment();
        // $counter->increment();
        self::assertEquals(1, $counter->getCounter());
        return $counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter): void
    {
        $counter->increment();
        self::assertEquals(2, $counter->getCounter());
    }
}
