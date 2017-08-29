<?php

$router = $di->getRouter();

// Define your routes here
 $router->add(
        '/api/login/login', [
    'controller' => 'login',
    'action' => 'login',
        ]
);
  $router->add(
        '/api/login/loginapi', [
    'controller' => 'login',
    'action' => 'api',
        ]
);

$router->handle();
