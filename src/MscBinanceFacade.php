<?php

namespace Mscakir\MscBinance;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mscakir\MscBinance\
 */
class MscBinanceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'msc-binance';
    }
}
