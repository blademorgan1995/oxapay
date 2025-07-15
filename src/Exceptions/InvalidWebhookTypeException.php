<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class InvalidWebhookTypeException extends Exception
{
    protected $message = 'Invalid webhook data type.';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
