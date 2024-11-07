<?php

namespace BelajarPhpPsr\Arya;

use Monolog;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class UserService
{
    public function __construct(private LoggerInterface $logger) {}

    public function save(string $name)
    {
        $this->logger->log(LogLevel::INFO, "User $name is saved");
    }
}
