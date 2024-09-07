<?php

namespace Model {
    class Comment
    {
        public function __construct(
            private ?int $id = null,
            private ?string $email = null,
            private ?string $comment = null
        ) {}

        public function getId(): int
        {
            return $this->id;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getComment(): string
        {
            return $this->comment;
        }

        public function setid(int $id)
        {
            $this->id = $id;
        }

        public function setEmail(int $email)
        {
            $this->email = $email;
        }

        public function setComment(int $comment)
        {
            $this->comment = $comment;
        }
    }
}
