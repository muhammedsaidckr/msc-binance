<?php

namespace Mscakir\MscBinance\Clients;

use Mscakir\MscBinance\Authentication\ApiCredentials;

class ApiClientOptions
{
    public string $baseAddress;

    public ApiCredentials $apiCredentials;

    public function __construct()
    {
    }

    /**
     * @param string $baseAddress
     * @return ApiClientOptions
     */
    public static function withBaseAddress(string $baseAddress): ApiClientOptions
    {
        $instance = new self();
        $instance->baseAddress = $baseAddress;
        return $instance;
    }

    /**
     * @param ApiClientOptions $baseOptions
     * @param ApiClientOptions|null $newValues
     * @return ApiClientOptions
     */
    public function withApiClientOptions(ApiClientOptions $baseOptions, ApiClientOptions $newValues = null): ApiClientOptions
    {
        $instance = new self();
        $instance->baseAddress = isset($newValues) ? $newValues->baseAddress : $baseOptions->baseAddress;
        $instance->apiCredentials = isset($newValues) ? $newValues->apiCredentials : $baseOptions->apiCredentials;
        return $instance;
    }
}
