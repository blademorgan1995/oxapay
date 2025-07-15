<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class InvalidHmacSignatureException extends Exception
{
    protected $message = 'Invalid HMAC signature.';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
