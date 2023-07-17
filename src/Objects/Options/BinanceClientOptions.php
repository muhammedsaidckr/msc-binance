<?php

namespace Mscakir\MscBinance\Objects\Options;

use Mscakir\MscBinance\Objects\BinanceApiAddresses;

class BinanceClientOptions extends BaseRestClientOptions
{
    private BinanceApiClientOptions $_spotApiOptions;

    /**
     * Spot API Options
     *
     * @var BinanceApiClientOptions $spotApiOptions
     */
    public BinanceApiClientOptions $spotApiOptions;

    private BinanceApiClientOptions $_usdFuturesApiOptions;

    /**
     * Usd futures API Options
     *
     * @var BinanceApiClientOptions $usdFuturesApiOptions
     */
    public BinanceApiClientOptions $usdFuturesApiOptions;

    private BinanceApiClientOptions $_coinFuturesApiOptions;

    /**
     * Coin futures API Options
     *
     * @var BinanceApiClientOptions $coinFuturesApiOptions
     */
    public BinanceApiClientOptions $coinFuturesApiOptions;

    public function __construct()
    {
        parent::__construct();
        $this->_spotApiOptions = BinanceApiClientOptions::withBaseAddress(BinanceApiAddresses::default()
            ->restClientAddress);
        $this->_spotApiOptions->autoTimestamp = true;

        $this->_usdFuturesApiOptions = BinanceApiClientOptions::withBaseAddress(BinanceApiAddresses::default()
            ->usdFuturesRestClientAddress);
        $this->_usdFuturesApiOptions->autoTimestamp = true;

        $this->_coinFuturesApiOptions = BinanceApiClientOptions::withBaseAddress(BinanceApiAddresses::default()
            ->coinFuturesRestClientAddress);
        $this->_coinFuturesApiOptions->autoTimestamp = true;
    }

    /**
     * @return BinanceClientOptions
     */
    public static function default(): BinanceClientOptions
    {
        return new self();
    }

    public function __get(string $name)
    {
        parent::__get($name);
        if ($name == 'spotApiOptions') {
            $this->spotApiOptions = $this->_spotApiOptions;
        } else {
            if ($name == 'usdFuturesApiOptions') {
                $this->usdFuturesApiOptions = $this->_usdFuturesApiOptions;
            } else {
                if ($name == 'coinFuturesApiOptions') {
                    $this->coinFuturesApiOptions = $this->_coinFuturesApiOptions;
                }
            }
        }
    }

    public function __set(string $name, mixed $value)
    {
        parent::__set($name, $value);
        if ($name == 'spotApiOptions') {
            $this->_spotApiOptions = $value;
        } else {
            if ($name == 'usdFuturesApiOptions') {
                $this->_spotApiOptions = $value;
            } else {
                if ($name == 'coinFuturesApiOptions') {
                    $this->_coinFuturesApiOptions = $value;
                }
            }
        }
    }
}
