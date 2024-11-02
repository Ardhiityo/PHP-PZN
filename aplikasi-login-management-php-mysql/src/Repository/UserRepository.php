<?php

namespace Arya\Mvc\Repository;

require_once __DIR__ . '/../Domain/User.php';

use PDO;
use Arya\Mvc\Domain\User;

class UserRepository
{
    public function __construct(private PDO $connection) {}

    public function save(User $user): User
    {
        $statement = $this->connection->prepare("INSERT INTO users(id, name, password) VALUES (?, ?, ?)");
        $statement->execute([
            $user->id,
            $user->name,
            $user->password
        ]);

        return $user;
    }

    public function findById(string $id): ?User
    {
        $statement = $this->connection->prepare("SELECT id, name, password FROM users WHERE id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $user = new User();
                $user->id = $row['id'];
                $user->name = $row['name'];
                $user->password = $row['password'];
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function update(User $user): void
    {
        $statement = $this->connection->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
        $statement->execute([
            $user->name,
            $user->password,
            $user->id
        ]);
    }
    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM users");
    }
}
