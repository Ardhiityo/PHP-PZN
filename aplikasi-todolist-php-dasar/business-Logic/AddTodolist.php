<?php

require_once __DIR__ . '/../model/todolist.php';

function addTodolist($todo)
{
    global $todolist;
    $todolist[count($todolist) + 1] = $todo;
};
