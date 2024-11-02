<?php

namespace Arya\Mvc\Controller;

require_once __DIR__ . "/../App/View.php";

use PDO;
use Arya\Mvc\App\View;
use Arya\Mvc\Config\Database;
use Arya\Mvc\Repository\SessionsRepository;
use Arya\Mvc\Repository\UserRepository;
use Arya\Mvc\Service\SessionsService;

class HomeController {
    
    public SessionsService $sessionsService;
    public SessionsRepository $sessionsRepository;
    private PDO $connection;
    public UserRepository $userRepository;

    public function __construct()
    {
        $this->connection = Database::connection("production");
        $this->sessionsRepository = new SessionsRepository($this->connection);
        $this->sessionsService = new SessionsService($this->sessionsRepository, $this->connection);
        $this->userRepository = new UserRepository( $this->connection);
    }
    
    public function index() {
        
        $sessions = $this->sessionsService->current();
        
        if($sessions == null) {
            View::render("Layouts/header", [
                "title" => "Home",
            ]);
            View::render("index");
            View::render("Layouts/footer");
        } else {
            View::render("Layouts/header", [
                "title" => "Dashboard",
            ]);
            View::render("dashboard",  [
                    "id" => $sessions->id,
                    "name" => $sessions->name,
                ]);
            View::render("Layouts/footer");
        }
        
    }
}