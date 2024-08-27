<?php

require_once __DIR__ . '/../business-logic/ShowTodolist.php';
require_once __DIR__ . '/../business-logic/RemoveTodolist.php';
require_once __DIR__ . '/../helper/input.php';

function viewRemoveTodolist()
{
    $removeTodo = input("Masukan nomor yang akan dihapus");
    removeTodolist($removeTodo);
    showTodolist();
}
