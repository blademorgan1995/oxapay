<?php

namespace OxaPay\OxaPay\Concerns;

use Illuminate\Support\Facades\Http;
use OxaPay\OxaPay\Exceptions\ConnectionException;

trait OxaRequest
{
    use OxaResponse;

    public function sendRequest($url, $data = [], $action = 'post', $header = [])
    {
        // default header
        $headers['Accept'] = 'application/json';

        // set header
        if (!empty($header)) {
            $headers[$header['key']] = $header['value'];
        }

        // request & response
        try {
            $requestTimeout = config('oxapay.request_timeout');
            $http = Http::withHeaders($headers);
            $response = $http->timeout($requestTimeout)->$action($url, $data);
        } catch (\Throwable $e) {
            // can not connect
            throw new ConnectionException('Unable to connect to the server. Please check your network or try again later.', $e->getCode());
        }

        // generate exceptions or return response
        return $this->generateResponse($response);
    }
}
