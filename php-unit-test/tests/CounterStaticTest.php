<?php

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;
use Programmerzamannow\BelajarPhpUnitTest\Counter;

class CounterStaticTest extends TestCase
{
    private static $counter;

    // Hanya dieksekusi diawal saja sebanyak 1 kali
    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    // Hanya dieksekusi diakhir saja sebanyak 1 kali
    // public static function tearDownAfterClass(): void
    // {
    //     echo "Tear down";
    // }

    public function testFirst()
    {
        self::$counter->increment();
        self::assertEquals(1, self::$counter->getCounter());
    }

    public function testSecond()
    {
        self::$counter->increment();
        self::assertEquals(2, self::$counter->getCounter());
    }

    public function testThird()
    {
        // Kode dibawah akan dieksekusi
        echo "Hello";

        self::markTestIncomplete("test ini blm selesai");

        // Kode dibawah ini tdk akan dieksekusi
        echo "Hello";
    }

    public function testSkipped()
    {
        self::markTestSkipped("test ini di skip");
    }

    /**
     * @requires OSFAMILY Windows
     * @requires PHP >= 8
     */
    public function testOnlyWindows()
    {
        self::assertTrue(true, "This test is only run on Windows");
    }

    /**
     * @requires OSFAMILY Darwin
     */
    public function testOnlyMac()
    {
        self::assertTrue(true, "This test is only run on Mac");
    }
}
