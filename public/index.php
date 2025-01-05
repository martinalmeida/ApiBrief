<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use ApiBrief\Core\Logger;
use ApiBrief\Core\Router;
use ApiBrief\Exceptions\ValidationException;

// Cargar las rutas configuradas
$router = require_once __DIR__ . '/../config/routes.php';

try {
    // Registrar la solicitud en los logs
    Logger::logRequest();

    // Procesar la solicitud y ejecutar el controlador correspondiente
    $router->dispatch();
} catch (ValidationException $e) {
    http_response_code($e->getCode());
    echo json_encode(['error' => $e->getMessage()]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error interno del servidor']);
}
