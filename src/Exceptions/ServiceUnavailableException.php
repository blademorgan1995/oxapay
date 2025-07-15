<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class ServiceUnavailableException extends Exception
{
    protected $message = 'The service is temporarily unavailable. Please try again later.';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
