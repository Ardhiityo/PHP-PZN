<?php

require_once __DIR__ . '/../helper/input.php';

require_once __DIR__ . '/../business-logic/AddTodolist.php';
require_once __DIR__ . '/../business-logic/ShowTodolist.php';


function viewAddTodolist()
{
    $todo = input("Masukan todo");
    addTodolist($todo);
    showTodolist();
};
