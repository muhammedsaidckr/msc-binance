<?php

namespace Mscakir\MscBinance\Objects;

class BinanceApiAddresses
{
    public string $restClientAddress = "";

    public string $socketClientAddress = "";

    public string|null $blvtSocketClientAddress;

    public string|null $usdFuturesRestClientAddress;

    public string|null $usdFuturesSocketClientAddress;

    public string|null $coinFuturesRestClientAddress;

    public string|null $coinFuturesSocketClientAddress;

    public function __construct()
    {
    }


    /**
     * The default addresses to connect to the binance.com API
     *
     * @return BinanceApiAddresses
     */
    public static function default(): BinanceApiAddresses
    {
        $instance = new self();
        $instance->restClientAddress = "https://api.binance.com";
        $instance->socketClientAddress = "wss://stream.binance.com:9443/";
        $instance->blvtSocketClientAddress = "wss://nbstream.binance.com/lvt-p";
        $instance->usdFuturesRestClientAddress = "https://fapi.binance.com";
        $instance->usdFuturesSocketClientAddress = "wss://fstream.binance.com/";
        $instance->coinFuturesRestClientAddress = "https://dapi.binance.com";
        $instance->coinFuturesSocketClientAddress = "wss://dstream.binance.com/";

        return $instance;
    }


    /**
     * The addresses to connect to the binance testnet
     *
     * @return BinanceApiAddresses
     */
    public static function testNet(): BinanceApiAddresses
    {
        $instance = new self();
        $instance->restClientAddress = "https://testnet.binance.vision";
        $instance->socketClientAddress = "wss://testnet.binance.vision";
        $instance->blvtSocketClientAddress = "wss://fstream.binancefuture.com";
        $instance->usdFuturesRestClientAddress = "https://testnet.binancefuture.com";
        $instance->usdFuturesSocketClientAddress = "wss://fstream.binancefuture.com";
        $instance->coinFuturesRestClientAddress = "https://testnet.binancefuture.com";
        $instance->coinFuturesSocketClientAddress = "wss://dstream.binancefuture.com";

        return $instance;
    }
}
