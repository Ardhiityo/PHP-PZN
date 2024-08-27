<?php

namespace Repository {

    require_once  __DIR__ . "/../entity/Todolist.php";

    use Entity\Todolist;

    interface TodolistRepository
    {
        public function findAll(): array;
        public function save(Todolist $todolist): void;
        public function remove(Todolist $todolist): void;
    };

    class TodolistRepositoryImpl implements TodolistRepository
    {
        public $todolist = [];
        private $todolistEntity;

        public function __construct()
        {
            $this->todolistEntity = new Todolist();
        }

        public function findAll(): array
        {
            return $this->todolist;
        }

        public function save($todo): void
        {
            $this->todolistEntity->setTodo($todo);
            $this->todolist[count($this->todolist) + 1] = $this->todolistEntity->getTodo();
        }

        public function remove($pilihan): void
        {
            if ($pilihan > count($this->todolist)) {
                echo "Gagal menghapus : Pilihan nomor tidak tersedia" . PHP_EOL;
            } else {
                for ($i = $pilihan; $i < count($this->todolist); $i++) {
                    $this->todolist[$i] = $this->todolist[$i + 1];
                }

                unset($this->todolist[count($this->todolist)]);
            }
        }
    }
}
