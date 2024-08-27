<?php

namespace Entity {
    class Todolist
    {
        private string $todo;
        public function getTodo()
        {
            return $this->todo;
        }
        public function setTodo($todolist)
        {
            $this->todo = $todolist;
        }
    }
}
