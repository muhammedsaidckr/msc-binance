<?php

namespace Mscakir\MscBinance\Contracts\Clients;

use Binance\Interfaces\Clients\CoinFuturesApi\IBinanceRestClientCoinFuturesApi;
use Binance\Interfaces\Clients\GeneralApi\IBinanceRestClientGeneralApi;
use Binance\Interfaces\Clients\SpotApi\IBinanceRestClientSpotApi;
use Binance\Interfaces\Clients\UsdFuturesApi\IBinanceRestClientUsdFuturesApi;
use CryptoExchange\Authentication\ApiCredentials;
use CryptoExchange\Interfaces\IRestClient;

interface BinanceRestClient extends IRestClient
{
    /**
     * General API endpoints
     *
     * @return IBinanceRestClientGeneralApi
     */
    public function getGeneralApi(): IBinanceRestClientGeneralApi;

    /**
     * Coin futures API endpoints
     *
     * @return IBinanceRestClientCoinFuturesApi
     */
    public function getCoinFuturesApi(): IBinanceRestClientCoinFuturesApi;

    /**
     * Spot API endpoints
     *
     * @return IBinanceRestClientSpotApi
     */
    public function getSpotApi(): IBinanceRestClientSpotApi;

    /**
     * USD futures API endpoints
     *
     * @return IBinanceRestClientUsdFuturesApi
     */
    public function getUsdFuturesApi(): IBinanceRestClientUsdFuturesApi;

    /**
     * Set the API credentials for this client. All API clients in this client will use the new credentials, regardless of earlier set options.
     *
     * @param ApiCredentials $credentials The credentials to set
     * @return void
     */
    public function setApiCredentials(ApiCredentials $credentials);
}
