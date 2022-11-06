<?php

namespace Mscakir\MscBinance\Objects;

use Illuminate\Support\Collection;

class BinanceApiAddresses
{
    /**
     * The default addresses to connect to the binance.com API
     *
     * @return Collection
     */
    public static function default(): Collection
    {
        return new Collection(
            [
                "restClientAddress" => "https://api.binance.com",
                "socketClientAddress" => "wss://stream.binance.com:9443/",
                "blvtSocketClientAddress" => "wss://nbstream.binance.com/lvt-p",
                "usdFuturesRestClientAddress" => "https://fapi.binance.com",
                "usdFuturesSocketClientAddress" => "wss://fstream.binance.com/",
                "coinFuturesRestClientAddress" => "https://dapi.binance.com",
                "coinFuturesSocketClientAddress" => "wss://dstream.binance.com/",
            ]
        );
    }

    /**
     * The addresses to connect to the binance testnet
     *
     * @return Collection
     */
    public static function testNet(): Collection
    {
        return new Collection(
            [
                "restClientAddress" => "https://testnet.binance.vision",
                "socketClientAddress" => "wss://testnet.binance.vision",
                "blvtSocketClientAddress" => "wss://fstream.binancefuture.com",
                "usdFuturesRestClientAddress" => "https://testnet.binancefuture.com",
                "usdFuturesSocketClientAddress" => "wss://fstream.binancefuture.com",
                "coinFuturesRestClientAddress" => "https://testnet.binancefuture.com",
                "coinFuturesSocketClientAddress" => "wss://dstream.binancefuture.com",
            ]
        );
    }

}
