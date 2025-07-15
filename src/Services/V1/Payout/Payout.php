<?php

namespace OxaPay\OxaPay\Services\V1\Payout;

use OxaPay\OxaPay\Concerns\OxaApiKey;
use OxaPay\OxaPay\Concerns\OxaRequest;
use OxaPay\OxaPay\Concerns\OxaSetData;

class Payout
{
    use OxaRequest, OxaSetData, OxaApiKey;

    public function generate($data, $payout = null)
    {
        // generate header
        $header = ['key' => 'payout_api_key', 'value' => $this->payoutApiKey($payout)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payout";

        // set callbackUrl
        $mergedCallback = $this->callbackUrl($data, 'payout');
        $mergedData = $mergedCallback;

        // request & response
        return $this->sendRequest(url: $url, data: $mergedData, header: $header);
    }

    public function information($ident, $payout = null)
    {
        // generate header
        $header = ['key' => 'payout_api_key', 'value' => $this->payoutApiKey($payout)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payout/$ident";

        // request & response
        return $this->sendRequest(url: $url, header: $header, action: 'get');
    }

    public function history($data = null, $payout = null)
    {
        // generate header
        $header = ['key' => 'payout_api_key', 'value' => $this->payoutApiKey($payout)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payout";

        // request & response
        return $this->sendRequest(url: $url, data: $data, header: $header, action: 'get');
    }
}
