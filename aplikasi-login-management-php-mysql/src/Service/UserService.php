<?php

namespace Arya\Mvc\Service;

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Model/UserRequestRegister.php';
require_once __DIR__ . '/../Model/UserResponseRegister.php';
require_once __DIR__ . '/../Model/UserRequestLogin.php';
require_once __DIR__ . '/../Model/UserResponseLogin.php';
require_once __DIR__ . '/../Model/UserRequestUpdateName.php';
require_once __DIR__ . '/../Model/UserResponseUpdateName.php';
require_once __DIR__ . '/../Model/UserRequestUpdatePassword.php';
require_once __DIR__ . '/../Model/UserResponseUpdatePassword.php';

use PDO;
use Exception;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Config\Database;
use Arya\Mvc\Model\UserRequestLogin;
use Arya\Mvc\Model\UserResponseLogin;
use Arya\Mvc\Service\SessionsService;
use Arya\Mvc\Model\UserRequestRegister;
use Arya\Mvc\Repository\UserRepository;
use Arya\Mvc\Model\UserResponseRegister;
use Arya\Mvc\Model\UserRequestUpdateName;
use Arya\Mvc\Model\UserResponseUpdateName;
use Arya\Mvc\Repository\SessionsRepository;
use Arya\Mvc\Model\UserRequestUpdatePassword;
use Arya\Mvc\Model\UserResponseUpdatePassword;

class UserService
{

    private PDO $connection;
    private UserRepository $userRepository;
    private SessionsService $sessionsService;
    private SessionsRepository $sessionsRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->connection = Database::connection("production");

        $this->userRepository = $userRepository;

        $this->sessionsRepository = new SessionsRepository($this->connection);

        $this->sessionsService = new SessionsService($this->sessionsRepository,  $this->connection);
    }

    public function register(UserRequestRegister $request): UserResponseRegister
    {

        try {
            Database::beginTransaction();
            $this->validateRequestRegister($request);

            $user = $this->userRepository->findById($request->id);
            if ($user != null) {
                throw new Exception("User id already exist");
            }

            $user = new User();
            $user->id = $request->id;
            $user->name = $request->name;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
            $this->userRepository->save($user);

            $userResponseRegister = new UserResponseRegister();
            $userResponseRegister->user = $user;

            Database::commitTransaction();

            return $userResponseRegister;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw new Exception($exception->getMessage());
        }
    }
    public function validateRequestRegister(UserRequestRegister $request)
    {
        if ($request->id == null || $request->name == null || $request->password == null || trim($request->id) == "" || trim($request->name) == "" || trim($request->password) == "") {
            throw new Exception("Id, Name, Password can not be null");
        }
    }

    public function login(UserRequestLogin $request): UserResponseLogin
    {
        $this->validateRequestLogin($request);

        $user = $this->userRepository->findById($request->id);
        if ($user == null) {
            throw new Exception("Id or Password is wrong");
        }

        if (password_verify($request->password, $user->password)) {
            $userResponseLogin = new UserResponseLogin();
            $userResponseLogin->user = $user;
            return $userResponseLogin;
        } else {
            throw new Exception("Id or Password is wrong");
        }
    }

    public function validateRequestLogin(UserRequestLogin $request)
    {
        if ($request->id == null || $request->password == null || trim($request->id) == "" || trim($request->password) == "") {
            throw new Exception("Id, Password can not be null");
        }
    }

    public function updateProfileName(UserRequestUpdateName $userRequestUpdateName): UserResponseUpdateName
    {
        try {
            Database::beginTransaction();

            $this->validateRequestUpdateName($userRequestUpdateName);

            $user = $this->userRepository->findById($userRequestUpdateName->id);

            if ($user == null) {
                throw new Exception("User is not found");
            }

            $user->id = $userRequestUpdateName->id;
            $user->name = $userRequestUpdateName->name;
            $this->userRepository->update($user);

            $userResponseUpdateName = new UserResponseUpdateName();
            $userResponseUpdateName->user = $user;

            Database::commitTransaction();

            return $userResponseUpdateName;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw new Exception($exception->getMessage());
        }
    }

    public function validateRequestUpdateName(UserRequestUpdateName $userRequestUpdateName)
    {
        if ($userRequestUpdateName->name == null || trim($userRequestUpdateName->name) == "" || $userRequestUpdateName->id == null || trim($userRequestUpdateName->id) == "") {
            throw new Exception("Id, Name can not be null");
        }
    }

    public function updateProfilePassword(UserRequestUpdatePassword $userRequestUpdatePassword): UserResponseUpdatePassword
    {
        try {
            Database::beginTransaction();

            $this->validateRequestUpdatePassword($userRequestUpdatePassword);

            $user = $this->userRepository->findById($userRequestUpdatePassword->id);

            if ($user == null) {
                throw new Exception("User is not found");
            }

            if (password_verify($userRequestUpdatePassword->oldPassword, $user->password) != true) {
                throw new Exception("Old password is wrong");
            }

            $user->password = password_hash($userRequestUpdatePassword->newPassword, PASSWORD_BCRYPT);

            $this->userRepository->update($user);

            $userResponseUpdatePassword = new UserResponseUpdatePassword();
            $userResponseUpdatePassword->user = $user;

            Database::commitTransaction();

            return $userResponseUpdatePassword;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw new Exception($exception->getMessage());
        }
    }

    public function validateRequestUpdatePassword(UserRequestUpdatePassword $userRequestUpdatePassword): void
    {
        if ($userRequestUpdatePassword->id == null || $userRequestUpdatePassword->oldPassword == null || $userRequestUpdatePassword->newPassword == null || trim($userRequestUpdatePassword->id) == "" || trim($userRequestUpdatePassword->oldPassword) == "" || trim($userRequestUpdatePassword->newPassword) == "") {
            throw new Exception("Id, Old Password, New Password can not be null");
        }
    }
}
