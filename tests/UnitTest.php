<?php

namespace Mscakir\MscBinance\Tests;

use Money\Currency;
use Money\Money;
use Mscakir\MscBinance\Clients\BinanceClient;
use Mscakir\MscBinance\MscBinanceServiceProvider;
use Mscakir\MscBinance\Objects\BinanceClientOptions;
use Mscakir\MscBinance\Objects\Models\BinanceBalance;
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
    }

    public function test_total_is_sum_free_and_locked()
    {
        $binanceBalance = new BinanceBalance();
        $currency = new Currency("XBT");
        $binanceBalance->asset = "BTC";
        $binanceBalance->free = new Money("1000.00", $currency);
        $binanceBalance->locked = new Money("2300.00", $currency);

        $this->assertEquals(Money::sum($binanceBalance->free, $binanceBalance->locked), $binanceBalance->getTotal());
    }

    public function test_total_is_sum_manual_free_and_locked()
    {
        $binanceBalance = new BinanceBalance();
        $currency = new Currency("XBT");
        $binanceBalance->asset = "BTC";
        $binanceBalance->free = new Money("1000.00", $currency);
        $binanceBalance->locked = new Money("2300.00", $currency);

        $this->assertEquals(3300, $binanceBalance->getTotal()->getAmount());
    }
}
