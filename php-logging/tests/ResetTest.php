<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ResetTest extends TestCase
{

    public function testReset()
    {
        $logger = new Logger(ResetTest::class);
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../reset.log"));
        $logger->pushHandler(new StreamHandler("php://stderr"));

        self::assertNotNull($logger);

        for ($i = 0; $i < 1000; $i++) {
            $logger->info("Looping $i");
            if ($i % 50 == 0) {
                $logger->reset();
            }
        }
    }
}
