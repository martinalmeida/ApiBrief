<?php

declare(strict_types=1);

namespace ApiBrief\Core;

use ApiBrief\Exceptions\HttpException;

/**
 * Clase Router
 * 
 * Encargada de manejar las rutas registradas y procesar las solicitudes.
 */
class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler, array $middlewares = []): void
    {
        $this->addRoute('GET', $path, $handler, $middlewares);
    }

    public function post(string $path, callable $handler, array $middlewares = []): void
    {
        $this->addRoute('POST', $path, $handler, $middlewares);
    }

    public function put(string $path, callable $handler, array $middlewares = []): void
    {
        $this->addRoute('PUT', $path, $handler, $middlewares);
    }

    public function delete(string $path, callable $handler, array $middlewares = []): void
    {
        $this->addRoute('DELETE', $path, $handler, $middlewares);
    }

    public function patch(string $path, callable $handler, array $middlewares = []): void
    {
        $this->addRoute('PATCH', $path, $handler, $middlewares);
    }

    private function addRoute(string $method, string $path, callable $handler, array $middlewares): void
    {
        $this->routes[] = compact('method', 'path', 'handler', 'middlewares');
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                foreach ($route['middlewares'] as $middleware) {
                    (new $middleware())->handle();
                }
                echo json_encode(call_user_func($route['handler']));
                return;
            }
        }

        throw new HttpException('Ruta no encontrada', 404);
    }
}
