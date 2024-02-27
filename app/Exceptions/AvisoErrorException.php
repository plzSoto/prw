<?php

namespace App\Exceptions;

use Exception;

class AvisoErrorException extends Exception
{
    public function __construct($message = "Aviso no encontrado", $code = 404, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
