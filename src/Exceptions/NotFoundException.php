<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message = 'Route Not Found!';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
