<?php

use Monolog\Logger;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;

class ProcessorTest extends TestCase
{
    public function testProcessor()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(function ($record) {
            $record["extra"]["details"] = [
                "author" => "arya"
            ];
            return $record;
        });

        $logger->info("Hello World", ["name" => "Eko"]);

        self::assertNotNull($logger);
    }
}
