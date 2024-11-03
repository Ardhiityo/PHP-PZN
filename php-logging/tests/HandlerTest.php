<?php

namespace Arya\Mvc;

use Monolog\Logger;
use Monolog\Handler\Handler;
use Monolog\Handler\StreamHandler;
use PHPUnit\Framework\TestCase;

class HandlerTest extends TestCase
{

    public function testHandler()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));

        self::assertNotNull($logger);
        self::assertSame(2, sizeof($logger->getHandlers()));
    }
}
