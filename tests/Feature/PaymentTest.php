<?php

namespace Tests\Feature;

use Tests\TestCase;
use OxaPay\OxaPay\Facades\OxaPay;

class PaymentTest extends TestCase
{
    protected static $invoiceId;
    protected static $whitelabelId;
    protected static $staticAddress;

    public function test_generate_invoice()
    {
        $data = [
            "amount" => 1.5,
            "currency" => "TRX",
            "sandbox" => true,
        ];

        try {
            $response = OxaPay::payment()->generateInvoice($data);
            $responseData = $response->getData(true);

            self::$invoiceId = $responseData['data']['track_id'] ?? 0;
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_generate_white_label()
    {
        // set data
        $data = [
            "amount" => 10,
            "pay_currency" => "TRX",
            "currency" => "USD",
        ];

        try {
            // send request & get response
            $response = OxaPay::payment()->generateWhiteLabel($data);
            $responseData = $response->getData(true);

            // set track_id
            self::$whitelabelId = $responseData['data']['track_id'] ?? 0;

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_generate_static_address()
    {
        // set data
        $data = [
            "network" => "TRON",
            "to_currency" => "USDT",
        ];

        try {
            // send request & get response
            $response = OxaPay::payment()->generateStaticAddress($data);
            $responseData = $response->getData(true);

            // set track_id
            self::$staticAddress = $responseData['data']['address'] ?? 0;

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_information()
    {
        try {
            // send request & get response
            $response = OxaPay::payment()->information(self::$invoiceId);
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
            $response = OxaPay::payment()->history();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_accepted_currencies()
    {
        try {
            // send request & get response
            $response = OxaPay::payment()->acceptedCurrencies();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_revoke_static_address()
    {
        // set data
        $data = [
            "address" => self::$staticAddress
        ];

        try {
            // send request & get response
            $response = OxaPay::payment()->revokeStaticAddress($data);
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_static_address_list()
    {
        try {
            // send request & get response
            $response = OxaPay::payment()->staticAddressList();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

}
