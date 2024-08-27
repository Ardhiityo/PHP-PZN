<?php

$value = null;

echo $value ?? 'Value tidak ada';

echo PHP_EOL;

$data = [];

$action = $data['action'] ?? 'nothing';

echo $action;
