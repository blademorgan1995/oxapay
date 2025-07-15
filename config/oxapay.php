<?php

return [

    /**
     * baseUrl
     */
    'base_url' => 'https://api.oxapay.com',

    /**
     * waiting time for each request
     */
    'request_timeout' => 30, // second

    /**
     * callbackUrl
    */
    'callback_url' => [
        // payment (invoice, white_label, static_address, payment_link, donation)
        'payment' => '', // https://example.com/api/oxapay/callback/payment

        // payout
        'payout' => '', // https://example.com/api/oxapay/callback/payout
    ],

    /**
     * merchants API KEYS
     */
    'merchants' => [
        'default' => 'value_1',
        'key_2' => 'value_2',
    ],

    /**
     * payouts API KEYS
     */
    'payouts' => [
        'default' => 'value_1',
        'key_2' => 'value_2',
    ],

    /**
     * general API KEYS
     */
    'general' => [
        'default' => 'value_1',
        'key_2' => 'value_2',
    ],

];
