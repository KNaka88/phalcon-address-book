<?php

use Phalcon\Mvc\Router;

// Create the router
$router = new Router();

// Define a route
// $router->add(
//     "/:controller/:action/",
//     [
//         "controller" => 1,
//         "action"     => 2
//     ]
// );

$router->add(
    "/users/id/:params/:action/",
    [
        "controller" => "users",
        "params"     => 1,
        "action"     => 2,
    ]
);

$router->handle();
