<?php

namespace Mscakir\MscBinance\Objects;

class BinanceClientOptions extends BaseRestClientOptions
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return BinanceClientOptions
     */
    public static function default() : BinanceClientOptions
    {
        return new self();
    }
}
