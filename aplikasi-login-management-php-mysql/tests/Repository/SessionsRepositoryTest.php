<?php

namespace Arya\Mvc\Repository;

use PDO;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Config\Database;
use Arya\Mvc\Domain\Sessions;
use PHPUnit\Framework\TestCase;
use Arya\Mvc\Repository\UserRepository;
use Arya\Mvc\Repository\SessionsRepository;

class SessionsRepositoryTest extends TestCase
{
    private SessionsRepository $sessionsRepository;
    private Sessions $sessions;
    private UserRepository $userRepository;
    private User $user;
    private PDO $connection;

    protected function setUp(): void
    {
        $this->connection = Database::connection();

        $this->user = new User();

        $this->sessions = new Sessions();

        $this->sessionsRepository = new SessionsRepository($this->connection);

        $this->userRepository = new UserRepository($this->connection);
    }

    protected function tearDown(): void
    {
        $this->sessionsRepository->deleteAll();
        $this->userRepository->deleteAll();
    }

    public function testSave()
    {
        $this->user->id = "pzn";
        $this->user->name = "PZN";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);
        $this->userRepository->save($this->user);

        $this->sessions->id = "eko";
        $this->sessions->id_users = "pzn";

        $result = $this->sessionsRepository->save($this->sessions);

        self::assertEquals($this->user->id, $result->id_users);
    }

    public function testFindByIdNotFound()
    {
        $result = $this->sessionsRepository->findById("notfound");
        self::assertNull($result);
    }

    public function testFindByIdFound()
    {
        $this->user->id = "pzn";
        $this->user->name = "Eko";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);
        $this->userRepository->save($this->user);

        $this->sessions->id = "1";
        $this->sessions->id_users = "pzn";
        $this->sessionsRepository->save($this->sessions);

        $result = $this->sessionsRepository->findById("pzn");
        self::assertEquals($this->user->id, $result->id_users);
    }

    public function testDeleteById()
    {
        $this->user->id = "pzn";
        $this->user->name = "eko";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);
        $this->userRepository->save($this->user);

        $this->sessions->id = "eko";
        $this->sessions->id_users = "pzn";
        $this->sessionsRepository->save($this->sessions);

        $this->sessionsRepository->deleteById("pzn");

        $result = $this->sessionsRepository->findById("pzn");
        self::assertNull($result);
    }
}
