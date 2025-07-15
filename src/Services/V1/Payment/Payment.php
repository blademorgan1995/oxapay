<?php

namespace OxaPay\OxaPay\Services\V1\Payment;

use OxaPay\OxaPay\Concerns\OxaApiKey;
use OxaPay\OxaPay\Concerns\OxaRequest;
use OxaPay\OxaPay\Concerns\OxaSetData;

class Payment
{
    use OxaRequest, OxaSetData, OxaApiKey;

    // generate
    public function generateInvoice($data, $merchant = null)
    {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/invoice";

        // set callbackUrl
        $mergedCallback = $this->callbackUrl($data, 'payment');
        $mergedData = $mergedCallback;

        // request & response
        return $this->sendRequest($url, $mergedData, 'post', $header);
    }

    public function generateWhiteLabel($data, $merchant = null) {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/white-label";

        // set callbackUrl
        $mergedCallback = $this->callbackUrl($data, 'payment');
        $mergedData = $mergedCallback;

        // request & response
        return $this->sendRequest($url, $mergedData, 'post', $header);
    }

    public function generateStaticAddress($data, $merchant = null) {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/static-address";

        // set callbackUrl
        $mergedCallback = $this->callbackUrl($data, 'payment');
        $mergedData = $mergedCallback;

        // request & response
        return $this->sendRequest($url, $mergedData, 'post', $header);
    }


    // history
    public function information($ident, $merchant = null)
    {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/$ident";

        // request & response
        return $this->sendRequest($url, [], 'get', $header);
    }

    public function history($data = null, $merchant = null)
    {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/static-address";

        // request & response
        return $this->sendRequest($url, $data, 'get', $header);
    }

    public function acceptedCurrencies($merchant = null)
    {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/accepted-currencies";

        // request & response
        return $this->sendRequest($url, [],'get', $header);
    }


    // static address
    public function revokeStaticAddress($data, $merchant = null)
    {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/static-address/revoke";

        // request & response
        return $this->sendRequest($url, $data, 'post', $header);
    }

    public function staticAddressList($data = null, $merchant = null)
    {
        // generate header
        $header = ['key' => 'merchant_api_key', 'value' => $this->paymentApiKey($merchant)];

        // generate url
        $baseUrl = config('oxapay.base_url');
        $url = "$baseUrl/v1/payment/static-address";

        // request & response
        return $this->sendRequest($url, $data, 'get', $header);
    }

}
