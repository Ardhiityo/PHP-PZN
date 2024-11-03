<?php

// header

// cookie

namespace Arya\Mvc\Controller {

    require_once __DIR__ . "/../Helper/Helper.php";

    use Arya\Mvc\App;
    use Arya\Mvc\Service;

    use Arya\Mvc\Domain\Sessions;

    use Arya\Mvc\Service\SessionsService;
    use Arya\Mvc\Repository\SessionsRepository;

    use PDO;
    use Arya\Mvc\App\View;
    use Arya\Mvc\Config\Database;
    use Arya\Mvc\Domain\User;
    use PHPUnit\Framework\TestCase;
    use Arya\Mvc\Controller\UserController;
    use Arya\Mvc\Repository\UserRepository;
    use Exception;

    class UserControllerTest extends TestCase
    {
        private PDO $connection;
        private UserController $userController;
        private UserRepository $userRepository;
        private SessionsRepository $sessionsRepository;
        private SessionsService $sessionsService;
        protected function setUp(): void
        {
            $this->connection = Database::connection();

            $this->userController = new UserController("tests");

            $this->userRepository = new UserRepository($this->connection);

            $this->sessionsRepository = new SessionsRepository($this->connection);

            $this->sessionsService = new SessionsService($this->sessionsRepository, $this->connection);

            putenv("mode=test");
        }

        protected function tearDown(): void
        {
            $this->sessionsRepository->deleteAll();
            $this->userRepository->deleteAll();
        }

        public function tesViewsLogin()
        {
            View::render("login");
            self::expectOutputRegex("[Login]");
        }

        public function testViewsRegister()
        {
            View::render("register");
            self::expectOutputRegex("[Register]");
        }

        public function testRestoreRegisterSuccess()
        {
            $_POST["id"] = "pzn";
            $_POST["name"] = "pzn";
            $_POST["password"] = "pzn";

            $this->userController->restoreRegister();

            self::expectOutputRegex("[Location: /users/login]");
        }

        public function testRestoreRegisterFailed()
        {
            $_POST["id"] = "";
            $_POST["name"] = "";
            $_POST["password"] = "";

            $this->userController->restoreRegister();

            self::expectOutputRegex("[Id, Name, Password can not be null]");
        }

        public function testRestoreRegisterDuplicate()
        {
            $user = new User();
            $user->id = "eko";
            $user->name = "eko";
            $user->password = "eko";

            $this->userRepository->save($user);

            $_POST["id"] = "eko";
            $_POST["name"] = "eko";
            $_POST["password"] = "eko";

            $this->userController->restoreRegister();

            self::expectOutputRegex("[User id already exist]");
        }

        public function testRestoreLoginSuccess()
        {
            $user = new User();
            $user->id = "pzn";
            $user->name = "pzn";
            $user->password = password_hash("pzn", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $_POST["id"] = "pzn";
            $_POST["password"] = "pzn";

            $this->userController->restoreLogin();

            self::expectOutputRegex("[Location: /]");
        }

        public function testRestoreLoginFailedWrongPassword()
        {
            $user = new User();
            $user->id = "pzn";
            $user->name = "pzn";
            $user->password = password_hash("pzn", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $_POST["id"] = "pzn";
            $_POST["password"] = "123";

            $this->userController->restoreLogin();

            self::expectOutputRegex("[Id or Password is wrong]");
        }

        public function testRestoreLoginFailedUserNotFound()
        {
            $user = new User();
            $user->id = "pzn";
            $user->name = "pzn";
            $user->password = password_hash("pzn", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $_POST["id"] = "eko";
            $_POST["password"] = "pzn";

            $this->userController->restoreLogin();

            self::expectOutputRegex("[Id or Password is wrong]");
        }

        public function testRestoreLoginFailedIdNull()
        {
            $_POST["id"] = "";
            $_POST["password"] = "";

            $this->userController->restoreLogin();

            self::expectOutputRegex("[Id, Password can not be null]");
        }

        public function testlogout()
        {
            $user = new User();
            $user->id = "pzn";
            $user->name = "pzn";
            $user->password = password_hash("pzn", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $user->id;

            $this->userController->logout();

            self::expectOutputRegex("[Location: /]");
        }

        public function testRestoreProfileSuccess()
        {
            $user = new User();
            $user->id = "pzn";
            $user->name = "pzn";
            $user->password = password_hash("pzn", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $sessions->id_users;

            $_POST["name"] = "eko";

            $this->userController->restoreProfile();

            self::expectOutputRegex("[Location: /]");

            $user = $this->userRepository->findById($user->id);

            self::assertEquals("eko", $user->name);
        }

        public function testRestoreProfileFailed()
        {
            $user = new User();
            $user->id = "pzn";
            $user->name = "pzn";
            $user->password = password_hash("pzn", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $sessions->id_users;

            $_POST["name"] = "";

            $this->userController->restoreProfile();

            self::expectOutputRegex("[Id, Name can not be null]");
        }

        public function testPassword()
        {
            $user = new User();
            $user->id = uniqid();
            $user->name = "Zaki";
            $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $sessions->id_users;

            $this->userController->password();

            self::expectOutputRegex("[Id]");
            self::expectOutputRegex("[Old Password]");
            self::expectOutputRegex("[New Password]");
        }

        public function testRestorePasswordSuccess()
        {
            $user = new User();
            $user->id = uniqid();
            $user->name = "Zaki";
            $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $sessions->id_users;
            $_POST["oldPassword"] = "rahasia";
            $_POST["newPassword"] = 'rahasia123';

            $this->userController->restorePassword();

            self::expectOutputRegex("[Location: /]");

            $check = $this->userRepository->findById($user->id);

            self::assertTrue(password_verify("rahasia123", $check->password));
        }

        public function testRestorePasswordFailedWrong()
        {
            $user = new User();
            $user->id = uniqid();
            $user->name = "Zaki";
            $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $sessions->id_users;
            $_POST["oldPassword"] = "rahasia123";
            $_POST["newPassword"] = 'rahasia';

            $this->userController->restorePassword();

            self::expectOutputRegex("[Old password is wrong]");
        }

        public function testRestorePasswordFailedNull()
        {
            $user = new User();
            $user->id = uniqid();
            $user->name = "Zaki";
            $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $sessions = new Sessions();
            $sessions->id = uniqid();
            $sessions->id_users = $user->id;

            $this->sessionsRepository->save($sessions);

            $_COOKIE["X-AR-SESSION"] = $sessions->id_users;
            $_POST["oldPassword"] = "";
            $_POST["newPassword"] = "";

            $this->userController->restorePassword();

            self::expectOutputRegex("[Id, Old Password, New Password can not be null]");
        }
    }
}
