<?php

require_once __DIR__ . '/view/TodolistView.php';

use view\TodolistView;

$todolistView = new TodolistView();
$todolistView->showTodolist();
