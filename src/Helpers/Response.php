<?php

declare(strict_types=1);

namespace ApiBrief\Helpers;

/**
 * Clase Response
 * 
 * Encargada de enviar respuestas formateadas.
 */
class Response
{
    /**
     * Enviar una respuesta JSON.
     * 
     * @param mixed $data Datos de la respuesta.
     * @param int $status Código de estado HTTP.
     * @return void
     */
    public static function json(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
