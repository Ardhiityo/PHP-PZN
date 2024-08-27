<?php

require_once __DIR__ . '/../model/todolist.php';
require_once __DIR__ . '/AddTodolist.php';
require_once __DIR__ . '/ShowTodolist.php';

function removeTodolist($pilihan)
{
    global $todolist;

    if ($pilihan > count($todolist)) {
        echo "Gagal menghapus : Pilihan nomor tidak tersedia" . PHP_EOL;
    } else {
        for ($i = $pilihan; $i < count($todolist); $i++) {
            $todolist[$i] = $todolist[$i + 1];
        }

        unset($todolist[count($todolist)]);
    }
}
