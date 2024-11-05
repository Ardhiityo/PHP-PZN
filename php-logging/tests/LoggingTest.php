<?php

namespace Arya\Mvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggingTest extends TestCase
{
    public function testLog()
    {
        $logger = new Logger(LoggingTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));

        $logger->info("Hello World");

        self::assertNotNull($logger);
    }
}
