<?php

require_once __DIR__ . '/view/TodolistView.php';
require_once __DIR__ . '/config/Database.php';

use View\TodolistView;

$todolistView = new TodolistView();
$todolistView->showTodolist();
