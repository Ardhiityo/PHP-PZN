<?php

namespace Arya\Mvc\Config;

use PDO;

class Database {
    
    private static ?PDO $pdo = null;

    public static function connection(string $env = "tests"): PDO
    {
        if (self::$pdo == null) {
           require_once __DIR__ . "/../Connection/Connection.php";
           $config = getConnection();
           self::$pdo = new PDO(
            $config[$env]["url"],
            $config[$env]["username"],
            $config[$env]["password"]
           );
        }
        return self::$pdo;
    }
    
    public static function beginTransaction() {
        self::$pdo->beginTransaction();
    }
    
    public static function commitTransaction() {
        self::$pdo->commit();
    }
    
    public static function rollbackTransaction() {
        self::$pdo->rollBack();
    }
}