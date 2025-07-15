<?php

namespace OxaPay\OxaPay\Concerns;

use OxaPay\OxaPay\Exceptions\InvalidApiKeyException;
use OxaPay\OxaPay\Exceptions\InvalidParamException;
use OxaPay\OxaPay\Exceptions\InvalidRequestException;
use OxaPay\OxaPay\Exceptions\NotFoundException;
use OxaPay\OxaPay\Exceptions\ServerErrorException;
use OxaPay\OxaPay\Exceptions\ServiceUnavailableException;

trait OxaResponse
{
    protected $version;
    protected $error;
    protected $data;

    public function generateResponse($response)
    {
        // parse response
        $result = json_decode($response);
        $this->version = $result->version;
        $this->error = $result->error;
        $this->data = $result->data;

        // validation exception
        if ($result->status == 400) {
            // invalid param
            if ($result->error->type == 'invalid_param') {
                throw new InvalidParamException($result->error->message, $result->status);
            }

            // invalid request
            if ($result->error->type == 'invalid_request') {
                throw new InvalidRequestException($result->error->message, $result->status);
            }
        }

        // invalid api key
        if ($result->status == 401) {
            throw new InvalidApiKeyException($result->message, $result->status);
        }

        // not found
        if ($result->status == 404) {
            throw new NotFoundException($result->message, $result->status);
        }

        // server error
        if ($result->status == 500) {
            throw new ServerErrorException($result->message, $result->status);
        }

        // service unavailable
        if ($result->status == 503) {
            throw new ServiceUnavailableException($result->message, $result->status);
        }

        return response()->json($result);
    }
}
