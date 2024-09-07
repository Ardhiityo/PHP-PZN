<?php

require_once __DIR__ . '/../Model/Comment.php';
require_once __DIR__ . '/../Repository/CommentRepository.php';
require_once __DIR__ . '/../GetConnections.php';

use Model\{Comment};
use Repository\{CommentRepositoryImpl};

$connections = getConnection();

// $comment = new Comment(email: "test@gmail.com", comment: "test");
$commentRepository = new CommentRepositoryImpl($connections);

// $test = $commentRepository->insert($comment);
// $test = $commentRepository->findById(50);
// $test = $commentRepository->findAll();

// var_dump($test);

$connections = null;
