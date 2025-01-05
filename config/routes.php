<?php

declare(strict_types=1);

use ApiBrief\Core\Router;
use ApiBrief\Middlewares\AuthMiddleware;

$router = new Router();

$router->get('/public', function () {
    return ['message' => 'Ruta pública'];
});

$router->get('/protected', function () {
    return ['message' => 'Ruta protegida'];
}, [AuthMiddleware::class]);

$router->post('/validate', function () {
    $data = json_decode(file_get_contents('php://input'), true);

    ApiBrief\Core\Validator::validate($data, [
        'name' => '/^[a-zA-Z ]+$/',
        'email' => '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/'
    ]);

    return ['message' => 'Validación exitosa'];
});

return $router;
