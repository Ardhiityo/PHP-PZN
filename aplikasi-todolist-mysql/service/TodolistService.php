<?php

namespace Service {

    require_once __DIR__ . "/../repository/TodolistRepository.php";
    require_once __DIR__ . "/../entity/Todolist.php";

    use Repository\TodolistRepositoryImpl;

    interface TodolistService
    {
        public function showTodolist(): void;
        public function addTodolist(string $todo): void;
        public function removeTodolist(int $pilihan): void;
    }

    class TodolistServiceImpl implements TodolistService
    {
        private TodolistRepositoryImpl $todolistRepository;

        public function __construct(TodolistRepositoryImpl $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        public function showTodolist(): void
        {
            $findAll = $this->todolistRepository->findAll();

            echo "Todolist : " . PHP_EOL;

            foreach ($findAll as $value) {
                echo $value->getId() . ". " . $value->getTodo() . PHP_EOL;
            }
        }

        public function addTodolist($todo): void
        {
            $this->todolistRepository->save($todo);
        }

        public function removeTodolist(int $pilihan): void
        {
            $this->todolistRepository->remove($pilihan);
        }
    }
}
