<?php

namespace Arya\Mvc\Controller;

require_once __DIR__ . "/../App/View.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Service/UserService.php";
require_once __DIR__ . "/../Model/UserRequestRegister.php";
require_once __DIR__ . "/../Model/UserRequestUpdateName.php";
require_once __DIR__ . "/../Model/UserResponseUpdateName.php";
require_once __DIR__ . "/../Model/UserRequestUpdatePassword.php";
require_once __DIR__ . "/../Model/UserResponseUpdatePassword.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Model/UserResponseRegister.php";
require_once __DIR__ . "/../Repository/SessionsRepository.php";
require_once __DIR__ . "/../Service/SessionsService.php";
require_once __DIR__ . "/../Model/UserResponseLogin.php";


use PDO;
use Exception;
use Arya\Mvc\App\View;
use Arya\Mvc\Config\Database;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Service\UserService;
use Arya\Mvc\Model\UserRequestLogin;
use Arya\Mvc\Service\SessionsService;
use Arya\Mvc\Model\UserRequestRegister;
use Arya\Mvc\Repository\UserRepository;
use Arya\Mvc\Model\UserRequestUpdateName;
use Arya\Mvc\Repository\SessionsRepository;
use Arya\Mvc\Model\UserRequestUpdatePassword;

class UserController
{
    private PDO $connection;
    private UserRepository $userRepository;
    private SessionsRepository $sessionsRepository;
    private SessionsService $sessionsService;
    private UserService $userService;
    private UserRequestUpdateName $userRequestUpdateName;
    private UserRequestUpdatePassword $userRequestUpdatePassword;

    public function __construct(string $env = "production")
    {
        $this->connection = Database::connection($env);

        $this->userRepository = new UserRepository($this->connection);

        $this->sessionsRepository = new SessionsRepository($this->connection);

        $this->sessionsService = new SessionsService($this->sessionsRepository, $this->connection);

        $this->userService = new UserService($this->userRepository);

        $this->userRequestUpdateName = new UserRequestUpdateName();

        $this->userRequestUpdatePassword = new UserRequestUpdatePassword();
    }

    public function register()
    {
        $model = [
            "title" => "Register",
        ];
        View::render("Layouts/header", $model);

        View::render("register",);

        View::render("Layouts/footer");
    }

    public function login()
    {
        $model = [
            "title" => "Login",
        ];
        View::render("Layouts/header", $model);

        View::render("login",);

        View::render("Layouts/footer",);
    }

    public function restoreRegister()
    {
        try {
            $userService = new UserService($this->userRepository);

            $userRequestRegister = new UserRequestRegister();

            $userRequestRegister->id = $_POST["id"];

            $userRequestRegister->name = $_POST["name"];

            $userRequestRegister->password = $_POST["password"];

            $userService->register($userRequestRegister);

            View::redirect("/users/login");
        } catch (Exception $exception) {
            $model = [
                "title" => "Register",
                "error" => $exception->getMessage(),
            ];
            View::render("Layouts/header", $model);

            View::render("register", $model);

            View::render("Layouts/footer",);
        }
    }

    public function restoreLogin()
    {
        try {
            $userService = new UserService($this->userRepository);

            $userRequestLogin = new UserRequestLogin();

            $userRequestLogin->id = $_POST["id"];

            $userRequestLogin->password = $_POST["password"];

            $sessions = $userService->login($userRequestLogin);

            $this->sessionsService->create($sessions->user->id);

            View::redirect("/");
        } catch (Exception $exception) {
            $model = [
                "title" => "Login",
                "error" => $exception->getMessage(),
            ];

            View::render("Layouts/header", $model);

            View::render("login", $model);

            View::render("Layouts/footer",);
        }
    }

    public function profile()
    {
        View::render("Layouts/header", ["title" => "Profile"]);
        $user = $this->sessionsService->current();


        View::render(
            "profile",
            ["id" => $user->id, "name" => $user->name]
        );

        View::render("Layouts/footer");
    }

    public function restoreProfile()
    {
        try {
            $id = $this->sessionsService->current()->id;

            $this->userRequestUpdateName->id = $id;
            $this->userRequestUpdateName->name = $_POST["name"];

            $this->userService->updateProfileName($this->userRequestUpdateName);

            View::redirect("/");
        } catch (Exception $exception) {
            $model = [
                "title" => "Profile",
                "error" => $exception->getMessage(),
                "id" => $id,
            ];

            View::render("Layouts/header", $model);

            View::render("profile", $model);

            View::render("Layouts/footer",);
        }
    }

    public function logout()
    {
        $this->sessionsService->destroy();

        View::redirect("/");
    }

    public function password()
    {
        View::render("Layouts/header", ["title" => "Password"]);

        $user = $this->sessionsService->current();

        View::render(
            "setting",
            ["id" => $user->id]
        );

        View::render("Layouts/footer");
    }

    public function restorePassword()
    {
        try {
            $id = $this->sessionsService->current()->id;

            $this->userRequestUpdatePassword->id = $id;

            $this->userRequestUpdatePassword->oldPassword = $_POST["oldPassword"];

            $this->userRequestUpdatePassword->newPassword = $_POST["newPassword"];

            $this->userService->updateProfilePassword($this->userRequestUpdatePassword);

            View::redirect("/");
        } catch (Exception $exception) {
            $model = [
                "title" => "Password",
                "error" => $exception->getMessage(),
                "id" => $id,
            ];

            View::render("Layouts/header", $model);

            View::render("setting", $model);

            View::render("Layouts/footer",);
        }
    }
}
