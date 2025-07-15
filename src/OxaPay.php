<?php

namespace OxaPay\OxaPay;

use OxaPay\OxaPay\Services\V1\Webhook\Webhook;
use OxaPay\OxaPay\Services\V1\Common\Common;
use OxaPay\OxaPay\Services\V1\Exchange\Exchange;
use OxaPay\OxaPay\Services\V1\Payment\Payment;
use OxaPay\OxaPay\Services\V1\Payout\Payout;

class OxaPay
{
// V1

// payment
    public function payment()
    {
        return new Payment();
    }

// common
    public function common()
    {
        return new Common();
    }

// payout
    public function payout()
    {
        return new Payout();
    }

// exchange
    public function exchange()
    {
        return new Exchange();
    }

// webhook
    public function webhook()
    {
        return new Webhook();
    }

}
