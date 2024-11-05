<?php

namespace Arya\Mvc;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testLog()
    {
        $logger = new Logger("Pzn");

        self::assertNotNull($logger);
    }

    public function testLogWithName()
    {
        $logger = new Logger(LoggerTest::class);

        self::assertNotNull($logger);
    }
}
