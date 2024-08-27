<?php

require_once __DIR__ . '/../model/todolist.php';

function showTodolist()
{
    global $todolist;

    echo "Todolist" . PHP_EOL;

    foreach ($todolist as $key => $value) {
        echo "$key. $value" . PHP_EOL;
    }
};
