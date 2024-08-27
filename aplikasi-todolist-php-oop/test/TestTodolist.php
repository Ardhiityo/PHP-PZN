<?php

require_once __DIR__ . "/../service/TodolistService.php";
require_once __DIR__ . "/../repository/TodolistRepository.php";
require_once __DIR__ . "/../entity/Todolist.php";
require_once __DIR__ . "/../view/TodolistView.php";

use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;
use View\TodolistView;

function showTodolist()
{
    $todolistView = new TodolistView();
    $todolistView->showTodolist();
}

showTodolist();
