<?php

require_once "data/Helper.php";
require_once "data/Conflict.php";

use Data\One\Conflict;
use function Helper\helpMe;
use const Helper\APPLICATION;

// Class
$conflict = new Conflict();
$conflict2 = new Data\Two\Conflict();

// Function
helpMe();

// Constant
echo APPLICATION . PHP_EOL;
