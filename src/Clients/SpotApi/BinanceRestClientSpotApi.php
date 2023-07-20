<?php

namespace Mscakir\MscBinance\Clients\SpotApi;

use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Authentication\AuthenticationProvider;
use Mscakir\MscBinance\Clients\ApiClientOptions;
use Mscakir\MscBinance\Clients\RestApiClient;
use Mscakir\MscBinance\Contracts\Clients\SpotApi\BinanceRestClientSpotApiInterface;
use Mscakir\MscBinance\Objects\Options\BaseClientOptions;
use Mscakir\MscBinance\Objects\Options\BinanceApiClientOptions;
use Mscakir\MscBinance\Objects\Options\BinanceClientOptions;
use Mscakir\MscBinance\Objects\Options\RestApiClientOptions;
use Mscakir\MscBinance\Objects\TimeSyncInfo;
use Psr\Http\Message\ResponseInterface;

class BinanceRestClientSpotApi extends RestApiClient implements BinanceRestClientSpotApiInterface
{
    public function __construct(BinanceClientOptions $options, RestApiClientOptions $apiClientOptions)
    {
        $apiClientOptions->baseAddress = 'https://api.binance.com/';
        $apiClientOptions->apiCredentials = ApiCredentials::createWithApiAndSecretKey(
            'key',
            'secret'
        );
        parent::__construct($options, $apiClientOptions);

        // define accounts
    }


    /**
     * @param  \Mscakir\MscBinance\Authentication\ApiCredentials  $credentials
     * @return void
     */
    public function setApiCredentials(ApiCredentials $credentials): void
    {
        // TODO: Implement setApiCredentials() method.
    }

    public function getTimeSyncInfo(): TimeSyncInfo
    {
        // TODO: Implement getTimeSyncInfo() method.
    }

    public function getTimeOffset(): int
    {
        // TODO: Implement getTimeOffset() method.
    }

    protected function getServerTimestampAsync(): ResponseInterface
    {
        // TODO: Implement getServerTimestampAsync() method.
    }

    protected function createAuthenticationProvider(ApiCredentials $apiCredentials): AuthenticationProvider
    {
        // TODO: Implement createAuthenticationProvider() method.
    }
}