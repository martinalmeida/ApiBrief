<?php

/**
 * Archivo de configuración para las reglas de validación.
 * 
 * Define las reglas para validar los parámetros de cada endpoint.
 */

return [
    'user_create' => [
        'name' => 'required|string|min:3|max:50',
        'email' => 'required|string',
        'password' => 'required|string|min:6',
    ],
];
