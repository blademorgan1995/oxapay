<?php

namespace Tests\Feature;

use Tests\TestCase;
use OxaPay\OxaPay\Facades\OxaPay;

class CommonTest extends TestCase
{
    public function test_prices()
    {
        try {
            // send request & get response
            $response = OxaPay::common()->prices();
            $responseData = $response->getData(true);

            $assertTrue = false;
            if ($responseData['status'] === 200) {
                $assertTrue = true;
            }

            // check status
            $this->assertTrue($assertTrue);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_currencies()
    {
        try {
            // send request & get response
            $response = OxaPay::common()->currencies();
            $responseData = $response->getData(true);

            $assertTrue = false;
            if ($responseData['status'] === 200) {
                $assertTrue = true;
            }
            
            // check status
            $this->assertTrue($assertTrue);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_fiats()
    {
        try {
            // send request & get response
            $response = OxaPay::common()->fiats();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_networks()
    {
        try {
            // send request & get response
            $response = OxaPay::common()->networks();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_system_status()
    {
        try {
            // send request & get response
            $response = OxaPay::common()->systemStatus();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }

    public function test_balance()
    {
        try {
            // send request & get response
            $response = OxaPay::common()->balance();
            $responseData = $response->getData(true);

            // check status
            $this->assertTrue($responseData['status'] === 200 ? true : false);
        } catch (\Throwable $e) {
            $this->fail($e->getMessage());
        }
    }
}
