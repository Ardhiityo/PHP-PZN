<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Response;

$factory = new Psr17Factory();
$creator =
    new ServerRequestCreator(
        $factory, // ServerRequestFactory
        $factory, // UriFactory
        $factory, // UploadedFileFactory
        $factory  // StreamFactory
    );

$serverRequest = $creator->fromGlobals();
// var_dump($serverRequest);

$queryParam = $serverRequest->getQueryParams();

$name = "$queryParam[nama]";

$response = new Response(
    status: 200,
    headers: [
        "Content-Type" => "application/json"
    ],
    body: $factory->createStream(json_encode([
        "message" => "Hello $name"
    ]))
);

$emitter = new SapiEmitter();
$emitter->emit($response);
