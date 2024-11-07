<?php

namespace BelajarPhpPsr\Arya;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

class HttpClientTest extends TestCase
{
    public function testHttpClient()
    {
        $stream = Utils::streamFor(json_encode([
            "name" => "Arya",
            "age" => 20,
        ]));

        $request = new Request(
            method: "POST",
            uri: "https://en94vlxaidpm.x.pipedream.net/",
            headers: [
                "Content-Type" => "application/json",
            ],
            body: $stream,
        );

        $client = new Client();
        $response = $client->sendRequest($request);

        self::assertNotNull($response);
        self::assertEquals(200, $response->getStatusCode());
    }
}
