<?php

namespace Arya\Mvc;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\StreamHandler;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("Hello World", ["Name" => "Arya"]);

        self::assertNotNull($logger);
    }
}
