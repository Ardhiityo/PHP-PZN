<?php

namespace Arya\Mvc\Controller;

use PDO;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Config\Database;
use PHPUnit\Framework\TestCase;
use Arya\Mvc\Controller\HomeController;
use Arya\Mvc\Domain\Sessions;
use Arya\Mvc\Repository\UserRepository;
use Arya\Mvc\Repository\SessionsRepository;

class HomeControllerTest extends TestCase
{

    private HomeController $homeController;
    private User $user;
    private UserRepository $userRepository;
    private PDO $connection;
    private SessionsRepository $sessionsRepository;
    private Sessions $sessions;

    protected function setUp(): void
    {
        $this->connection = Database::connection();
        $this->homeController = new HomeController();
        $this->user = new User();
        $this->userRepository = new UserRepository($this->connection);
        $this->sessionsRepository = new SessionsRepository($this->connection);
        $this->sessions = new Sessions();
    }

    protected function tearDown(): void
    {
        $this->sessionsRepository->deleteAll();
        $this->userRepository->deleteAll();
    }

    public function testGuest()
    {
        $this->homeController->index();

        self::expectOutputRegex("[Login Management]");
        self::expectOutputRegex("[Login]");
        self::expectOutputRegex("[Register]");
    }

    public function testUserLogin()
    {

        $this->user->id = "pzn";
        $this->user->name = "pzn";
        $this->user->password = password_verify("password", PASSWORD_BCRYPT);

        $this->userRepository->save($this->user);

        $sessions = new Sessions();
        $sessions->id = uniqid();
        $sessions->id_users = $this->user->id;

        $this->sessionsRepository->save($sessions);

        $_COOKIE["X-AR-SESSION"] = $this->user->id;
        $this->homeController->index();

        self::expectOutputRegex("[Welcome {$this->user->name}]");
        self::expectOutputRegex("[Profile]");
        self::expectOutputRegex("[Password]");
        self::expectOutputRegex("[Logout]");
    }
}
