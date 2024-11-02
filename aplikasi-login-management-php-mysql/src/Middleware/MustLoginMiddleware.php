<?php

namespace Arya\Mvc\Middleware;

require_once __DIR__ . "/Middleware.php";
require_once __DIR__ . "/../Service/SessionsService.php";
require_once __DIR__ . "/../Repository/SessionsRepository.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../App/View.php";

use PDO;
use Arya\Mvc\App\View;
use Arya\Mvc\Config\Database;
use Arya\Mvc\Domain\User;
use Arya\Mvc\Service\SessionsService;
use Arya\Mvc\Repository\SessionsRepository;
use Arya\Mvc\Middleware\Middleware;

class MustLoginMiddleware implements Middleware
{
    private PDO $connection;
    public SessionsService $sessionsService;
    public SessionsRepository $sessionsRepository;
    public function __construct()
    {
        $this->connection = Database::connection("production");

        $this->sessionsRepository = new SessionsRepository($this->connection);

        $this->sessionsService = new SessionsService($this->sessionsRepository, $this->connection);
    }

    public function before(): void
    {
        $sessions = $this->sessionsService->current();
        if ($sessions == null) {
            View::redirect("/users/login");
        }
    }
}
