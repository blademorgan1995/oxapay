<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class ServerErrorException extends Exception
{
    protected $message = 'An internal server error occurred. Please try again later.';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
