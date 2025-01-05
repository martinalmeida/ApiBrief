<?php

declare(strict_types=1);

namespace ApiBrief\Middlewares;

use ApiBrief\Core\Middleware;

/**
 * Middleware AuthMiddleware
 * 
 * Verifica si la solicitud contiene un token de autorización válido.
 */
class AuthMiddleware extends Middleware
{
    /**
     * Ejecuta la validación del token.
     * 
     * @return void
     */
    public function handle(): void
    {
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;

        if ($token !== 'Bearer ejemplo123') {
            http_response_code(401);
            echo json_encode(['error' => 'No autorizado']);
            exit;
        }
    }
}
