<?php

require_once '../business-Logic/AddTodolist.php';
require_once '../business-Logic/ShowTodolist.php';
require_once '../business-Logic/RemoveTodolist.php';

addTodolist("Eko");
addTodolist("Kurniawan");
addTodolist("Khannedy");
addTodolist("Budi");
addTodolist("Nugraha");

showTodolist();

removeTodolist(6);

showTodolist();
