<?php

namespace Mscakir\MscBinance\Clients;

use Exception;
use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Clients\SpotApi\BinanceRestClientSpotApi;
use Mscakir\MscBinance\Contracts\Clients\BinanceClientInterface;
use Mscakir\MscBinance\Objects\Options\BinanceClientOptions;

class BinanceClient extends BaseRestClient implements BinanceClientInterface
{
    protected BinanceRestClientSpotApi $spotApi;

    /**
     * @throws Exception
     */
    public function __construct(string $name, BinanceClientOptions $options)
    {
        parent::__construct($name, $options);
        $this->spotApi = self::addApiClient(app()->makeWith(BinanceRestClientSpotApi::class, ['options' => $options]));
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
        $this->spotApi->setApiCredentials($credentials);
    }
}
