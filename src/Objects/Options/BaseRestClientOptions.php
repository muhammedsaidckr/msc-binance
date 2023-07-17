<?php

namespace Mscakir\MscBinance\Objects\Options;

use GuzzleHttp\Client;

class BaseRestClientOptions extends BaseClientOptions
{
    public int $requestTimeout = 30;

    public Client $httpClient;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param BaseRestClientOptions|BaseClientOptions|BaseOptions|null $baseOptions
     * @return BaseRestClientOptions|null
     */
    public function withBaseOptions(BaseRestClientOptions|BaseClientOptions|BaseOptions $baseOptions = null): BaseRestClientOptions|null
    {
        $instance = new self();
        if($baseOptions == null) {
            return null;
        }
        parent::withBaseOptions($baseOptions);
        $this->httpClient = $baseOptions->httpClient;
        $this->requestTimeout = $baseOptions->requestTimeout;

        return $instance;
    }
}
