<?php

namespace Repository {

    require_once  __DIR__ . "/../entity/Todolist.php";
    require_once  __DIR__ . "/../config/Database.php";

    use Database;
    use Entity\Todolist;

    interface TodolistRepository
    {
        public function findAll(): array;
        public function save(Todolist $todolist): void;
        public function remove(Todolist $todolist): void;
    };

    class TodolistRepositoryImpl implements TodolistRepository
    {
        private $connection;

        public function __construct()
        {
            $this->connection = Database::getConnection();
        }

        public function findAll(): array
        {
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $array = [];

            while ($row = $statement->fetch()) {
                $todolist = new Todolist();
                $todolist->setId($row["id"]);
                $todolist->setTodo($row["todo"]);
                $array[] = $todolist;
            }

            return $array;
        }

        public function save($todo): void
        {
            $sql = "INSERT INTO todolist(todo) VALUES (?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todo]);
        }

        public function remove($pilihan): void
        {
            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$pilihan]);

            if ($statement->fetch()) {
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$pilihan]);
            } else {
                echo "Gagal menghapus : Pilihan nomor tidak tersedia" . PHP_EOL;
            }
        }
    }
}
