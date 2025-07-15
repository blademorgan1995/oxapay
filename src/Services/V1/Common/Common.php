<?php

namespace OxaPay\OxaPay\Services\V1\Common;

use OxaPay\OxaPay\Concerns\OxaApiKey;
use OxaPay\OxaPay\Concerns\OxaRequest;

class Common
{
    use OxaRequest, OxaApiKey;

    public function prices()
    {
        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/common/prices";

        return $this->sendRequest(url: $url, action: 'get');
    }

    public function currencies()
    {
        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/common/currencies";

        return $this->sendRequest(url: $url, action: 'get');
    }

    public function fiats()
    {
        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/common/fiats";

        return $this->sendRequest(url: $url, action: 'get');
    }

    public function networks()
    {
        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/common/networks";

        return $this->sendRequest(url: $url, action: 'get');
    }

    public function systemStatus()
    {
        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/common/monitor";

        return $this->sendRequest(url: $url, action: 'get');
    }

    public function balance($data = null, $general = null)
    {
        // generate header
        $header = ['key' => 'general_api_key', 'value' => $this->generalApiKey($general)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/general/account/balance";

        // request & response
        return $this->sendRequest(url: $url, data: $data, action: 'get', header: $header);
    }

}
