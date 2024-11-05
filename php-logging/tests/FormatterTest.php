<?php

namespace Arya\Mvc;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;

class FormatterTest extends TestCase
{
    public function testFormat()
    {
        $logger = new Logger(FormatterTest::class);

        $handler = new StreamHandler(__DIR__ . "/../formatter.log");

        $handler->setFormatter(new JsonFormatter());

        $logger->pushHandler($handler);

        $logger->info("Hello World");

        self::assertNotNull($logger);
    }
}
