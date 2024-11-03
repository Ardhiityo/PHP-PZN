<?php

namespace Arya\Mvc\Service;

require_once __DIR__ . "/../Domain/Sessions.php";
require_once __DIR__ . "/../Repository/SessionsRepository.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Config/Database.php";

use PDO;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Domain\Sessions;
use Arya\Mvc\Repository\UserRepository;
use Arya\Mvc\Repository\SessionsRepository;

class SessionsService
{
    private SessionsRepository  $sessionsRepository;
    static string $COOKIE_NAME = "X-AR-SESSION";
    private UserRepository $userRepository;
    private PDO $connection;

    public function __construct(SessionsRepository $sessionsRepository, PDO $connection)
    {
        $this->sessionsRepository = $sessionsRepository;
        $this->connection = $connection;
        $this->userRepository = new UserRepository($connection);
    }

    public function create(string $id_users): Sessions
    {
        setcookie(self::$COOKIE_NAME, $id_users, time() + (60 * 60 * 24 * 30), "/");

        $sessions = new Sessions();
        $sessions->id = uniqid();
        $sessions->id_users = $id_users;

        $this->sessionsRepository->save($sessions);
        return $sessions;
    }

    public function destroy(): void
    {
        $id_users = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionsRepository->deleteById($id_users);
        setcookie(self::$COOKIE_NAME, '', 1, "/");
    }

    public function current(): ?User
    {
        $id_users = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $sessions = $this->sessionsRepository->findById($id_users);

        if ($sessions == null) {
            return null;
        }

        return $this->userRepository->findById($id_users);
    }
}
