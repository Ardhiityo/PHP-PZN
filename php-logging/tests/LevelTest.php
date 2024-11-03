<?php

namespace Arya\Mvc;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\StreamHandler;

class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger("Pzn");

        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::WARNING));

        $logger->debug("Hello World");
        $logger->info("Hello World");
        $logger->notice("Hello World");
        $logger->warning("Hello World");
        $logger->error("Hello World");
        $logger->critical("Hello World");
        $logger->alert("Hello World");
        $logger->emergency("Hello");

        self::assertNotNull($logger);
    }
}
