<?php


namespace View {

    require_once __DIR__ . "/../repository/TodolistRepository.php";
    require_once __DIR__ . "/../service/TodolistService.php";
    require_once __DIR__ . "/../helper/TodolistInput.php";

    use Repository\TodolistRepositoryImpl;
    use Service\TodolistServiceImpl;
    use Input\TodolistInput;

    class TodolistView
    {

        public TodolistServiceImpl $todolistServiceImpl;
        public TodolistRepositoryImpl $todolistRepositoryImpl;
        public TodolistInput $todolistInput;

        public function __construct()
        {

            $todolistRepository = new TodolistRepositoryImpl();
            $todolistService = new TodolistServiceImpl($todolistRepository);
            $this->todolistInput = new TodolistInput();

            $this->todolistServiceImpl = $todolistService;
            $this->todolistRepositoryImpl = $todolistRepository;
            $this->todolistInput = new TodolistInput();
        }

        public function showTodolist(): void
        {
            while (true) {

                echo "Pilih 1 untuk menambah Todolist" . PHP_EOL;
                echo "Pilih 2 untuk menghapus Todolist" . PHP_EOL;
                echo "Pilih x untuk keluar" . PHP_EOL;
                echo PHP_EOL;

                $pilihan = $this->todolistInput->input("Pilihan");

                if ($pilihan == "1") {
                    $this->addTodolist();
                } else if ($pilihan == "2") {
                    $this->removeTodolist();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "Pilihan tidak dimengerti" . PHP_EOL;
                };
            }

            echo "Sampai Jumpa Lagi" . PHP_EOL;
        }
        public function addTodolist(): void
        {
            $todo = $this->todolistInput->input("Masukan Todo");
            $this->todolistServiceImpl->addTodolist($todo);
            $this->todolistServiceImpl->showTodolist();
        }
        public function removeTodolist(): void
        {
            $todo = $this->todolistInput->input("Masukan nomor yang akan dihapus");
            $this->todolistServiceImpl->removeTodolist($todo);
            $this->todolistServiceImpl->showTodolist();
        }
    }
}
