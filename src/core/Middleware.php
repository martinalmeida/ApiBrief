<?php

declare(strict_types=1);

namespace ApiBrief\Core;

/**
 * Clase base para Middlewares.
 * 
 * Todos los middlewares deben extender esta clase.
 */
abstract class Middleware
{
    /**
     * Método principal que se ejecuta al procesar el middleware.
     * 
     * @return void
     */
    abstract public function handle(): void;
}
