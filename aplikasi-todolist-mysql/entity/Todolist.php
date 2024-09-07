<?php

namespace Entity {
    class Todolist
    {
        private int $id;
        private string $todo;

        public function getId()
        {
            return $this->id;
        }

        public function getTodo()
        {
            return $this->todo;
        }


        public function setId($id)
        {
            $this->id = $id;
        }

        public function setTodo($todolist)
        {
            $this->todo = $todolist;
        }
    }
}
