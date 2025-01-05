<?php

declare(strict_types=1);

namespace ApiBrief\Core;

/**
 * Clase Logger
 * 
 * Encargada de registrar las solicitudes en un archivo de log.
 */
class Logger
{
    private const LOG_FILE = __DIR__ . '/../../logs/requests.log';

    /**
     * Registra la solicitud actual en un archivo de log.
     * 
     * @return void
     */
    public static function logRequest(): void
    {
        $logEntry = sprintf(
            "[%s] %s %s\n",
            date('Y-m-d H:i:s'),
            $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN',
            $_SERVER['REQUEST_URI'] ?? 'UNKNOWN'
        );

        file_put_contents(self::LOG_FILE, $logEntry, FILE_APPEND);
    }
}
