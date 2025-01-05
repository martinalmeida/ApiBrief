<?php

declare(strict_types=1);

namespace ApiBrief\Core;

use ApiBrief\Exceptions\ValidationException;

/**
 * Clase Validator
 * 
 * Encargada de validar datos de las solicitudes.
 */
class Validator
{
    /**
     * Valida los datos según las reglas proporcionadas.
     * 
     * @param array $data Datos a validar.
     * @param array $rules Reglas de validación.
     * @return void
     * 
     * @throws ValidationException
     */
    public static function validate(array $data, array $rules): void
    {
        foreach ($rules as $field => $rule) {
            if (!isset($data[$field]) || !preg_match($rule, (string) $data[$field])) {
                throw new ValidationException("El campo {$field} no cumple con las reglas de validación.");
            }
        }
    }
}
