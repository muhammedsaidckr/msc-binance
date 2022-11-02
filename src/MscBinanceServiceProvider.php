<?php

namespace Mscakir\MscBinance;

use Illuminate\Support\ServiceProvider;

class MscBinanceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('msc-binance.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/..config/config.php', 'msc-binance');

        $this->app->singleton('msc-binance', function () {
            return new MscBinance;
        });
    }
}
