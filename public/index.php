<?php

require __DIR__.'/../vendor/autoload.php';

use App\DataService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    return $response
        ->withStatus(500);
});

$app->get('/users', function(Request $request, Response $response, $args) {

    $queryParams = $request->getQueryParams();
    $name = $queryParams['name'] ?? null;

    $dataService = new DataService();
    $users = $dataService->getItems();

    if (count($users) > 0) {
        if ($name !== null) {
            $filteredUsers = [];
            foreach ($users as $user) {
                if ($name !== null && $user->name === $name) {
                    $filteredUsers[] = $user;
                }
            }

            $jsonData = json_encode($filteredUsers);
        } else {
            $jsonData = json_encode($users);
        }
    } else {
        $jsonData = json_encode([]);
    }

    $response->getBody()->write($jsonData);
    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
});


$app->run();
