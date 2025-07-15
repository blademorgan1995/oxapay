<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class ConnectionException extends Exception
{
    protected $message = 'Unable to connect to the server. Please check your network or try again later.';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
