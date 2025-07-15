<?php

namespace OxaPay\OxaPay\Exceptions;

use Exception;

class InvalidParamException extends Exception
{
    protected $message = 'There was an issue with the data provided. Please check your input and try again.';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message ?? $this->message, $code, $previous);
    }
}
