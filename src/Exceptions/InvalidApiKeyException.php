<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class InvalidApiKeyException extends Exception
{
    protected $message = 'The provided API key is invalid. Please verify and try again.';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
