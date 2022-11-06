<?php

namespace Mscakir\MscBinance\Tests;

use Mscakir\MscBinance\Clients\BinanceClient;
use Mscakir\MscBinance\MscBinanceServiceProvider;
use Mscakir\MscBinance\Objects\BinanceClientOptions;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class UnitTest extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app): array
    {
        return [
            MscBinanceServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }

    public function test_is_api_client_created()
    {
        $apiClient = new BinanceClient("Binance", BinanceClientOptions::default());

        $this->assertTrue("Binance" == $apiClient->name);
        $this->assertTrue();
    }
}
