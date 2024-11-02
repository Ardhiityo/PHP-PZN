<?php

namespace Arya\Mvc\Repository;

use PDO;
use Arya\Mvc\Domain\Sessions;

class SessionsRepository
{

    public function __construct(private PDO $connection) {}

    public function save(Sessions $sessions): Sessions
    {
        $statement = $this->connection->prepare("INSERT INTO sessions (id, id_users) VALUES (?, ?)");
        $statement->execute([
            $sessions->id,
            $sessions->id_users
        ]);

        return $sessions;
    }

    public function findById(string $id): ?Sessions
    {
        $statement = $this->connection->prepare("SELECT id,id_users FROM sessions WHERE id_users = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $sessions = new Sessions();
                $sessions->id = $row["id"];
                $sessions->id_users = $row["id_users"];
                return $sessions;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById(string $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM sessions WHERE id_users = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM sessions");
    }
}
