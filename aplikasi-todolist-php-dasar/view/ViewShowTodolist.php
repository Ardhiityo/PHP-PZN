<?php

require_once __DIR__ . '/../business-logic/ShowTodolist.php';
require_once __DIR__ . '/../business-logic/AddTodolist.php';
require_once __DIR__ . '/../business-logic/RemoveTodolist.php';

require_once __DIR__ . '/ViewAddTodolist.php';
require_once __DIR__ . '/ViewRemoveTodolist.php';

require_once __DIR__ . '/../helper/input.php';

function viewShowTodolist()
{
    while (true) {

        echo "Pilih 1 untuk menambah Todolist" . PHP_EOL;
        echo "Pilih 2 untuk menghapus Todolist" . PHP_EOL;
        echo "Pilih x untuk keluar" . PHP_EOL;
        echo PHP_EOL;

        $pilihan = input("Pilihan");

        if ($pilihan == "1") {
            viewAddTodolist();
        } else if ($pilihan == "2") {
            viewRemoveTodolist();
        } else if ($pilihan == "x") {
            break;
        } else {
            echo "Pilihan tidak dimengerti" . PHP_EOL;
        };
    }

    echo "Sampai Jumpa Lagi" . PHP_EOL;
}
