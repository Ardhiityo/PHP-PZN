<?php

namespace Arya\Mvc\Service;

use PDO;
use Exception;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Config\Database;
use Arya\Mvc\Domain\Sessions;
use PHPUnit\Framework\TestCase;
use Arya\Mvc\Service\UserService;
use Arya\Mvc\Model\UserRequestLogin;
use Arya\Mvc\Model\UserRequestUpdate;
use Arya\Mvc\Model\UserResponseLogin;
use Arya\Mvc\Model\UserRequestRegister;
use Arya\Mvc\Repository\UserRepository;
use Arya\Mvc\Model\UserResponseRegister;
use Arya\Mvc\Model\UserRequestUpdateName;
use Arya\Mvc\Repository\SessionsRepository;
use Arya\Mvc\Model\UserRequestUpdatePassword;

class UserServiceTest extends TestCase
{

    private PDO $connection;
    private UserRepository $userRepository;
    private User $user;
    private UserService $userRegister;
    private UserRequestRegister $userRequestRegister;
    private UserService $userService;
    private UserRequestLogin $userRequestLogin;
    private Sessions $sessions;
    private SessionsRepository $sessionsRepository;

    protected function setUp(): void
    {
        $this->connection = Database::connection();

        $this->user = new User();

        $this->userRepository = new UserRepository($this->connection);

        $this->userRegister = new UserService($this->userRepository);

        $this->userRequestRegister = new UserRequestRegister();

        $this->userService = new UserService($this->userRepository);

        $this->userRequestLogin = new UserRequestLogin();
        $this->sessions = new Sessions();

        $this->sessionsRepository = new SessionsRepository($this->connection);
    }

    public function tearDown(): void
    {
        $this->sessionsRepository->deleteAll();
        $this->userRepository->deleteAll();
    }

    public function testUserRegisterSuccess()
    {
        $this->userRequestRegister->id = "pzn";
        $this->userRequestRegister->name = "eko";
        $this->userRequestRegister->password = "rahasia";

        $result = $this->userRegister->register($this->userRequestRegister);

        self::assertEquals($this->userRequestRegister->id, $result->user->id);

        self::assertEquals($this->userRequestRegister->name, $result->user->name);

        self::assertTrue(password_verify($this->userRequestRegister->password, $result->user->password));
    }

    public function testUserRegisterFailed()
    {
        $this->userRequestRegister->id = "";
        $this->userRequestRegister->name = "";
        $this->userRequestRegister->password = "";

        self::expectException(Exception::class);

        $this->userRegister->register($this->userRequestRegister);
    }

    public function testUserRegisterDuplicate()
    {
        $this->user->id = "PZN";
        $this->user->name = "Eko Kurniawan";
        $this->user->password = "rahasia";
        $this->userRepository->save($this->user);

        $this->userRequestRegister->id = "PZN";
        $this->userRequestRegister->name = "Eko Kurrniawan";
        $this->userRequestRegister->password = "rahasia";

        self::expectException(Exception::class);

        $this->userRegister->register($this->userRequestRegister);
    }

    public function testLoginSuccess()
    {
        $this->user->id = "Arya";
        $this->user->name = "Eko Kurniawan";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);
        $this->userRepository->save($this->user);

        $this->userRequestLogin->id = "Arya";
        $this->userRequestLogin->password = "rahasia";
        $result = $this->userService->login($this->userRequestLogin);

        self::assertEquals($this->user->id, $result->user->id);
        self::assertTrue(password_verify($this->userRequestLogin->password, $result->user->password));
    }

    public function testLoginFailed()
    {
        $this->user->id = "Arya";
        $this->user->name = "Eko Kurniawan";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);
        $this->userRepository->save($this->user);

        $this->userRequestLogin->id = "Arya";
        $this->userRequestLogin->password = "123";

        self::expectException(Exception::class);

        $this->userService->login($this->userRequestLogin);
    }

    public function testUpdateProfileNameSuccess()
    {
        $this->user->id = uniqid();
        $this->user->name = "Budi";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);

        $this->userRepository->save($this->user);

        $this->sessions->id = uniqid();
        $this->sessions->id_users = $this->user->id;

        $this->sessionsRepository->save($this->sessions);

        $userRequestUpdate = new UserRequestUpdateName();
        $userRequestUpdate->id = $this->sessions->id_users;
        $userRequestUpdate->name = "Eko";

        $userResponse =  $this->userService->updateProfileName($userRequestUpdate);

        self::assertEquals($this->user->id, $userResponse->user->id);
        self::assertEquals("Eko", $userResponse->user->name);
        self::assertTrue(password_verify("rahasia", $userResponse->user->password));
    }

    public function testUpdateProfileNameFailed()
    {
        $this->user->id = uniqid();
        $this->user->name = "Budi";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);

        $this->userRepository->save($this->user);

        $this->sessions->id = uniqid();
        $this->sessions->id_users = $this->user->id;

        $this->sessionsRepository->save($this->sessions);

        $userRequestUpdate = new UserRequestUpdateName();
        $userRequestUpdate->id = $this->sessions->id_users;
        $userRequestUpdate->name = "";

        self::expectException(Exception::class);

        $this->userService->updateProfileName($userRequestUpdate);
    }

    public function testUpdateProfilePasswordSuccess()
    {
        $this->user->id = uniqid();
        $this->user->name = "Zaki";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);

        $this->userRepository->save($this->user);

        $this->sessions->id = uniqid();
        $this->sessions->id_users = $this->user->id;

        $this->sessionsRepository->save($this->sessions);

        $userRequestUpdatePassword = new UserRequestUpdatePassword();
        $userRequestUpdatePassword->id = $this->sessions->id_users;
        $userRequestUpdatePassword->oldPassword = "rahasia";
        $userRequestUpdatePassword->newPassword = "rahasia123";

        $result = $this->userService->updateProfilePassword($userRequestUpdatePassword);

        self::assertEquals($this->user->id, $result->user->id);

        self::assertTrue(password_verify("rahasia123", $result->user->password));
    }

    public function testUpdateProfilePasswordFailed()
    {
        $this->user->id = uniqid();
        $this->user->name = "Zaki";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);

        $this->userRepository->save($this->user);

        $this->sessions->id = uniqid();
        $this->sessions->id_users = $this->user->id;

        $this->sessionsRepository->save($this->sessions);

        $userRequestUpdatePassword = new UserRequestUpdatePassword();
        $userRequestUpdatePassword->id = $this->sessions->id_users;
        $userRequestUpdatePassword->oldPassword = "rahasia123";
        $userRequestUpdatePassword->newPassword = "rahasia";

        self::expectException(Exception::class);

        $this->userService->updateProfilePassword($userRequestUpdatePassword);
    }

    public function testUpdateProfilePasswordFailedNull()
    {
        $this->user->id = uniqid();
        $this->user->name = "Zaki";
        $this->user->password = password_hash("rahasia", PASSWORD_BCRYPT);

        $this->userRepository->save($this->user);

        $this->sessions->id = uniqid();
        $this->sessions->id_users = $this->user->id;

        $this->sessionsRepository->save($this->sessions);

        $userRequestUpdatePassword = new UserRequestUpdatePassword();
        $userRequestUpdatePassword->id = $this->sessions->id_users;
        $userRequestUpdatePassword->oldPassword = null;
        $userRequestUpdatePassword->newPassword = "";

        self::expectException(Exception::class);

        $this->userService->updateProfilePassword($userRequestUpdatePassword);
    }
}
