<?php
namespace Mscakir\MscBinance\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mscakir\MscBinance\MscBinanceServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
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
}
