<?php

namespace Arya\Mvc;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\StreamHandler;

class RotatingTest extends TestCase
{
    public function testRotating()
    {
        $logger = new Logger(FormatterTest::class);

        // Log yang hanya berisi 1 hari
        $logger->pushHandler(new RotatingFileHandler(__DIR__ . "/../rotating..log", 1, Logger::INFO));

        $logger->info("Test Rotating");

        self::assertNotNull($logger);
    }
}
