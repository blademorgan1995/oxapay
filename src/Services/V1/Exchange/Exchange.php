<?php

namespace OxaPay\OxaPay\Services\V1\Exchange;

use OxaPay\OxaPay\Concerns\OxaApiKey;
use OxaPay\OxaPay\Concerns\OxaRequest;

class Exchange
{
    use OxaRequest, OxaApiKey;

    public function request($data, $general = null)
    {
        // generate header
        $header = ['key' => 'general_api_key', 'value' => $this->generalApiKey($general)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/general/swap";

        // request & response
        return $this->sendRequest(url: $url, data: $data, header: $header);
    }
    public function rate($data, $general = null)
    {
        // generate header
        $header = ['key' => 'general_api_key', 'value' => $this->generalApiKey($general)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/general/swap/rate";

        // request & response
        return $this->sendRequest(url: $url, data: $data, header: $header);
    }
    public function calculate($data, $general = null)
    {
        // generate header
        $header = ['key' => 'general_api_key', 'value' => $this->generalApiKey($general)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/general/swap/calculate";

        // request & response
        return $this->sendRequest(url: $url, data: $data, header: $header);
    }

    public function pairs($general = null)
    {
        // generate header
        $header = ['key' => 'general_api_key', 'value' => $this->generalApiKey($general)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/general/swap/pairs";

        // request & response
        return $this->sendRequest(url: $url, action: 'get', header: $header);
    }
    public function history($data = null, $general = null)
    {
        // generate header
        $header = ['key' => 'general_api_key', 'value' => $this->generalApiKey($general)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/general/swap";

        // request & response
        return $this->sendRequest(url: $url, data: $data, action: 'get', header: $header);
    }
}
