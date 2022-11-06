<?php

namespace Mscakir\MscBinance\Clients;

use Exception;
use Mscakir\MscBinance\Contracts\Clients\BinanceClient as BinanceClientContract;
use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Objects\BaseClientOptions;
use Mscakir\MscBinance\Objects\BinanceClientOptions;

class BinanceClient extends BaseRestClient implements BinanceClientContract
{

    /**
     * @throws Exception
     */
    public function __construct(string $name = "Binance", BinanceClientOptions $options)
    {
        parent::__construct($name, $options);
    }

    /**
     * @return static
     * @throws Exception
     */
    public static function default(): self
    {
        return new self("Binance", BinanceClientOptions::default());
    }

    public static function withOptions()
    {
        /**
         * TODO: Binance Client Contracts will be created after then return
         */
    }

    public function setApiCredentials(ApiCredentials $credentials): void
    {

    }
}
