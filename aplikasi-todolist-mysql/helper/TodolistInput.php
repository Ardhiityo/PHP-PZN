<?php

namespace Input {
    class TodolistInput
    {
        public function input(string $info)
        {
            echo "$info : ";
            $result = fgets(STDIN);
            return trim($result);
        }
    }
}
