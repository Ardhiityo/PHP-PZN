<?php

require_once 'vendor/autoload.php';

// Autoload dari packagist
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Autoload dari packagist
$log = new Logger('name');
$log->pushHandler(new StreamHandler('path/to/your.log', Level::Warning));

$log->warning('Foo');
$log->error('Bar');
