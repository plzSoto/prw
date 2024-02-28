<?php

namespace App\Exceptions;

use Exception;

class AnimalErrorException extends Exception
{
    public function __construct($message = "Animal no encontrado", $code = 404, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
