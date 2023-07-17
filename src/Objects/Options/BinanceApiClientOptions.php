<?php

namespace Mscakir\MscBinance\Objects\Options;

use Mscakir\MscBinance\Clients\ApiClientOptions;

class BinanceApiClientOptions extends RestApiClientOptions
{
    public string $timestampOffset = "00:00:00";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param  string  $baseAddress
     * @return BinanceApiClientOptions|RestApiClientOptions
     */
    public static function withBaseAddress(string $baseAddress): BinanceApiClientOptions|RestApiClientOptions
    {
        $instance = new self();
        parent::withBaseAddress($baseAddress);
        return $instance;
    }

    /**
     * @param  BinanceApiClientOptions|RestApiClientOptions|ApiClientOptions  $baseOn
     * @param  BinanceApiClientOptions|RestApiClientOptions|ApiClientOptions|null  $newValues
     * @return RestApiClientOptions|BinanceApiClientOptions
     */
    public function withApiClientOptions(
        BinanceApiClientOptions|RestApiClientOptions|ApiClientOptions $baseOn,
        BinanceApiClientOptions|RestApiClientOptions|ApiClientOptions $newValues = null
    ): RestApiClientOptions|BinanceApiClientOptions {
        return parent::withApiClientOptions($baseOn, $newValues);
    }
}
