<?php

namespace Mscakir\MscBinance\Clients;

use Mscakir\MscBinance\Contracts\Clients\BinanceClient as BinanceClientContract;
use Mscakir\MscBinance\Authentication\ApiCredentials;

class BinanceClient implements BinanceClientContract
{
    public function __construct()
    {

    }

    public function setApiCredentials(ApiCredentials $credentials): void
    {
        // TODO: Implement setApiCredentials() method.
    }
}
