<?php

namespace Arya\Mvc\Config;

use PHPUnit\Framework\TestCase;
use Arya\Mvc\Config\Database;

class DatabaseTest extends TestCase
{
    public function testConnection()
    {
        $connection = Database::connection();
        self::assertNotNull($connection);
    }
}
