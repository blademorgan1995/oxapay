<?php

namespace Tests\Feature;

use Tests\TestCase;
use OxaPay\OxaPay\Facades\OxaPay;

class PayoutTest extends TestCase
{
    public function test_history()
    {
        try {
            // send request & get response
            $response = OxaPay::payout()->history();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }
}
