<?php

namespace OxaPay\OxaPay\Concerns;

trait OxaApiKey
{
    public function paymentApiKey($key)
    {
        if ($key === null) {
            $key = config('oxapay.merchants.default');
        }
        return $key;
    }

    public function payoutApiKey($key)
    {
        if ($key === null) {
            $key = config('oxapay.payouts.default');
        }
        return $key;
    }

    public function generalApiKey($key)
    {
        if ($key === null) {
            $key = config('oxapay.general.default');
        }
        return $key;
    }

}
