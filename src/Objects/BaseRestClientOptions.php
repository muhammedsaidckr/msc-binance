<?php

namespace Mscakir\MscBinance\Objects;

use GuzzleHttp\Client;
use Mscakir\MscBinance\Authentication\ApiCredentials;

class BaseRestClientOptions extends BaseClientOptions
{
    public int $requestTimeout = 30;

    public Client $httpClient;

    public function __construct()
    {
    }

    public function withBaseOptions(BaseRestClientOptions|BaseClientOptions $baseOptions = null): void
    {
        if($baseOptions == null) {
            return;
        }
        parent::withBaseOptions($baseOptions);
        $this->httpClient = $baseOptions->httpClient;
        $this->requestTimeout = $baseOptions->requestTimeout;
    }
}
