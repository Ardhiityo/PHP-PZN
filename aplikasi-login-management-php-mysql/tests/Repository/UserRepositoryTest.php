<?php

namespace Arya\Mvc\Repository;

use PDO;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Config\Database;
use PHPUnit\Framework\TestCase;
use Arya\Mvc\Repository\UserRepository;


class UserRepositoryTest extends TestCase
{

    private PDO $connection;
    private UserRepository $userRepository;
    private User $user;

    protected function setUp(): void
    {
        $this->connection = Database::connection();

        $this->userRepository = new UserRepository($this->connection);

        $this->user = new User();
    }

    public function tearDown(): void
    {
        $this->userRepository->deleteAll();
    }

    public function testSave()
    {
        $this->user->id = "PZN";
        $this->user->name = "Eko Kurniawan";
        $this->user->password = "rahasia";

        $save = $this->userRepository->save($this->user);

        self::assertEquals($this->user->id, $save->id);
        self::assertEquals($this->user->name, $save->name);
        self::assertEquals($this->user->password, $save->password);
    }

    public function testFindByIdSuccess()
    {
        $this->user->id = "PZN";
        $this->user->name = "Eko Kurniawan";
        $this->user->password = "rahasia";
        $this->userRepository->save($this->user);

        $findById = $this->userRepository->findById($this->user->id);
        self::assertEquals($this->user->id, $findById->id);
    }

    public function testFindByIdFailed()
    {
        $findById = $this->userRepository->findById("Salah");
        self::assertEquals(null, $findById);
    }
}
