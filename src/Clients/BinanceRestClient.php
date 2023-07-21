<?php

namespace Mscakir\MscBinance\Clients;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Binance\Options\BinanceRestOptions;
use Binance\Clients\GeneralApiClient;
use Binance\Clients\SpotApiClient;
use Binance\Clients\UsdFuturesApiClient;
use Binance\Clients\CoinFuturesApiClient;

class BinanceRestClient implements IBinanceRestClient
{
    /**
     * @var GeneralApiClient
     */
    protected $generalApi;

    /**
     * @var SpotApiClient
     */
    protected $spotApi;

    /**
     * @var UsdFuturesApiClient
     */
    protected $usdFuturesApi;

    /**
     * @var CoinFuturesApiClient
     */
    protected $coinFuturesApi;

    /**
     * Create a new instance of the BinanceRestClient using provided options
     *
     * @param callable $optionsDelegate Option configuration closure
     */
    public function __construct(callable $optionsDelegate)
    {
        $httpClient = new Client();
        $loggerFactory = null; // You can use Laravel's logger here if needed.

        $options = BinanceRestOptions::createDefault();
        $optionsDelegate($options);
        $this->initialize($options, $httpClient, $loggerFactory);
    }

    /**
     * Initialize the BinanceRestClient with options and API clients
     *
     * @param BinanceRestOptions $options
     * @param Client $httpClient
     * @param LoggerInterface|null $logger
     */
    protected function initialize(BinanceRestOptions $options, Client $httpClient, ?LoggerInterface $logger)
    {
        $this->generalApi = new GeneralApiClient($logger, $httpClient, $options);
        $this->spotApi = new SpotApiClient($logger, $httpClient, $options);
        $this->usdFuturesApi = new UsdFuturesApiClient($logger, $httpClient, $options);
        $this->coinFuturesApi = new CoinFuturesApiClient($logger, $httpClient, $options);
    }

    /**
     * Set the default options to be used when creating new clients
     *
     * @param callable $optionsDelegate Option configuration closure
     */
    public static function setDefaultOptions(callable $optionsDelegate)
    {
        $options = BinanceRestOptions::createDefault();
        $optionsDelegate($options);
        BinanceRestOptions::setDefault($options);
    }

    /**
     * Set the API credentials for all the API clients
     *
     * @param array $credentials
     */
    public function setApiCredentials(array $credentials)
    {
        $this->generalApi->setApiCredentials($credentials);
        $this->spotApi->setApiCredentials($credentials);
        $this->usdFuturesApi->setApiCredentials($credentials);
        $this->coinFuturesApi->setApiCredentials($credentials);
    }

    // Other methods for interacting with different Binance APIs can be added here
}
