<?php

namespace OxaPay\OxaPay\Services\V1\Webhook;

use OxaPay\OxaPay\Concerns\OxaApiKey;
use OxaPay\OxaPay\Exceptions\InvalidHmacSignatureException;
use OxaPay\OxaPay\Exceptions\InvalidWebhookTypeException;

class Webhook
{
    use OxaApiKey;

    public function getData()
    {
        $data = request()->all();
        $hmac = request()->header('HMAC');

        return ['data' => $data, 'hmac' => $hmac];
    }

    public function validate($apiKey = null)
    {
        // get data
        $response = $this->getData();
        $data = $response['data'];
        $hmac = $response['hmac'];

        // check type
        if (in_array($data['type'], ['invoice', 'white_label', 'static_address', 'payment_link', 'donation'])) {
            $apiSecretKey = $this->paymentApiKey($apiKey);
        } elseif ($data['type'] === 'payout') {
            $apiSecretKey = $this->payoutApiKey($apiKey);
        } else {
            throw new InvalidWebhookTypeException('Invalid webhook data type', 400);
        }

        // Validate HMAC signature
        $calculatedHmac = hash_hmac('sha512', request()->getContent(), $apiSecretKey);
        if ($calculatedHmac === $hmac) {
            // HMAC signature is valid
            return response()->json(['data' => $data], 200);
        } else {
            // HMAC signature is not valid
            throw new InvalidHmacSignatureException('Invalid HMAC signature.', 400);
        }
    }
}
