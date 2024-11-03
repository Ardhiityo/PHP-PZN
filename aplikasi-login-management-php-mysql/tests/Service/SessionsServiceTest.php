<?php

// cookie

namespace Arya\Mvc\Service {

    require_once __DIR__ . "/../Helper/Helper.php";

    use Arya\Mvc\Service;

    use Arya\Mvc\Domain\Sessions;
    use PDO;
    use Arya\Mvc\Domain\User;
    use Arya\Mvc\Config\Database;
    use PHPUnit\Framework\TestCase;
    use Arya\Mvc\Service\SessionsService;
    use Arya\Mvc\Repository\SessionsRepository;
    use Arya\Mvc\Repository\UserRepository;

    class SessionsServiceTest extends TestCase
    {
        private PDO $connection;
        private SessionsRepository $sessionsRepository;
        private SessionsService $sessionsService;
        private User $user;
        private UserRepository $userRepository;


        protected function setUp(): void
        {
            $this->connection = Database::connection();

            $this->sessionsRepository = new SessionsRepository($this->connection);

            $this->sessionsService = new SessionsService($this->sessionsRepository, $this->connection);

            $this->userRepository = new UserRepository($this->connection);

            $this->user = new User();
        }

        protected function tearDown(): void
        {
            $this->sessionsRepository->deleteAll();
            $this->userRepository->deleteAll();
        }

        public function testCreateSuccess()
        {
            $id  = $this->user->id = uniqid();
            $this->user->name = "pzn";
            $this->user->password = password_hash("arya", PASSWORD_BCRYPT);
            $this->userRepository->save($this->user);

            $sessions = $this->sessionsService->create($id);
            self::expectOutputRegex("[X-AR-SESSION : $sessions->id_users]");
        }

        public function testdestroySuccess()
        {
            $this->user->id = uniqid();
            $this->user->name = "arya";
            $this->user->password = password_hash("arya", PASSWORD_BCRYPT);

            $this->userRepository->save($this->user);

            $_COOKIE[SessionsService::$COOKIE_NAME] = $this->user->id;

            $this->sessionsService->destroy();
            self::expectOutputRegex("[X-AR-SESSION : ]");

            $result = $this->sessionsRepository->findById($this->user->id);
            self::assertNull($result);
        }

        public function current()
        {
            $id = $this->user->id = uniqid();
            $this->user->name = "arya";
            $this->user->password = password_hash("arya", PASSWORD_BCRYPT);

            $this->userRepository->save($this->user);

            $this->sessionsService->create($id);

            $sessions = $this->sessionsService->current();

            self::assertSame($id, $sessions->id);
        }
    }
}
