<?php

namespace Mscakir\MscBinance\Clients\SpotApi;

use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Authentication\AuthenticationProvider;
use Mscakir\MscBinance\Clients\RestApiClient;
use Mscakir\MscBinance\Contracts\Clients\SpotApi\BinanceRestClientSpotApiInterface;
use Mscakir\MscBinance\Objects\Options\BaseClientOptions;
use Mscakir\MscBinance\Objects\Options\RestApiClientOptions;
use Mscakir\MscBinance\Objects\TimeSyncInfo;
use Psr\Http\Message\ResponseInterface;

class BinanceRestClientSpotApi extends RestApiClient implements BinanceRestClientSpotApiInterface
{
    public function __construct(BaseClientOptions $options, RestApiClientOptions $apiOptions)
    {
        parent::__construct($options, $apiOptions);
    }


    public function setApiCredentials($credentials): void
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