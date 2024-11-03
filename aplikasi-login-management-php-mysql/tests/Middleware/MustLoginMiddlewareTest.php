<?php

// header

namespace Arya\Mvc\Middleware {

    require_once __DIR__ . "/../Helper/Helper.php";

    use Arya\Mvc\App;

    use Arya\Mvc\Domain\Sessions;
    use Arya\Mvc\Domain\User;
    use PDO;
    use Arya\Mvc\Middleware\MustLoginMiddleware;
    use Arya\Mvc\Config\Database;
    use PHPUnit\Framework\TestCase;
    use Arya\Mvc\Repository\UserRepository;
    use Arya\Mvc\Repository\SessionsRepository;

    class MustLoginMiddlewareTest extends TestCase
    {
        private PDO $connection;
        private UserRepository $userRepository;
        private SessionsRepository $sessionsRepository;
        private MustLoginMiddleware $mustLoginMiddleware;

        protected function setUp(): void
        {
            $this->connection = Database::connection();

            $this->userRepository = new UserRepository($this->connection);

            $this->sessionsRepository = new SessionsRepository($this->connection);

            $this->mustLoginMiddleware = new MustLoginMiddleware();

            putenv("mode=test");
        }

        protected function tearDown(): void
        {
            $this->sessionsRepository->deleteAll();
            $this->userRepository->deleteAll();
        }

        public function testBeforeNull()
        {
            $this->mustLoginMiddleware->before();

            self::expectOutputRegex("[Location: /users/login]");
        }

        public function testBeforeLogin()
        {
            $user = new User();
            $user->id = "arya";
            $user->name = "Arya";
            $user->password = password_hash("arya", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $sessions->id_users;

            $this->mustLoginMiddleware->before();

            self::expectOutputString("");
        }
    }
}
