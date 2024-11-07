<?php

namespace BelajarPhpPsr\Arya;

use Monolog\Formatter\JsonFormatter;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\StreamHandler;

class UserServiceTest extends TestCase
{

    public function testSave()
    {
        $logger = new Logger("test");
        $streamHandler = new StreamHandler("php://stdout");
        $streamHandler->setFormatter(new JsonFormatter());;
        $logger->pushHandler($streamHandler);

        $userService = new UserService($logger);
        $userService->save("Arya");

        self::assertNotNull($logger);
    }
}
