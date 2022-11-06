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

    public function setApiCredentials(ApiCredentials $credentials): void
    {

    }
}
