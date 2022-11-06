<?php

namespace Mscakir\MscBinance\Clients;

use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Contracts\Clients\RestClient;
use Mscakir\MscBinance\Contracts\RequestFactoryInterface;
use Mscakir\MscBinance\Objects\BaseClientOptions;
use Exception;

abstract class BaseRestClient extends BaseClient implements RestClient
{
    public RequestFactoryInterface $requestFactory;

    public int $totalRequestMade;

    protected array $standardRequestHeaders;

    public BaseClientOptions $clientOptions;

    public function __construct(string $name, BaseClientOptions $options)
    {
        parent::__construct($name, $options);
        $this->clientOptions = $options != null ? $options : throw new Exception(print_r($options));
    }

    public function setApiCredentials(ApiCredentials $credentials): void
    {
        foreach ($this->apiClients as $apiClient) {
            $apiClient->setApiCredentials($credentials);
        }
    }
}
