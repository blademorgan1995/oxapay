<?php

namespace Tests\Feature;

use Tests\TestCase;
use OxaPay\OxaPay\Facades\OxaPay;

class ExchangeTest extends TestCase
{
    public function test_rate()
    {
        // set data
        $data = [
            "from_currency" => "btc",
            "to_currency" => "usdt"
        ];

        try {
            // send request & get response
            $response = OxaPay::exchange()->rate($data);
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_calculate()
    {
        // set data
        $data = [
            "from_currency" => "btc",
            "to_currency" => "usdt",
            "amount" => 1
        ];

        try {
            // send request & get response
            $response = OxaPay::exchange()->calculate($data);
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_pairs()
    {
        try {
            // send request & get response
            $response = OxaPay::exchange()->pairs();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_history()
    {
        try {
            // send request & get response
            $response = OxaPay::exchange()->history();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }
}
