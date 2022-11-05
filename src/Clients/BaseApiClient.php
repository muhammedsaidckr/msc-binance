<?php

namespace Mscakir\MscBinance\Clients;

use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Authentication\AuthenticationProvider;
use Mscakir\MscBinance\Enums\ArrayParametersSerialization;
use Mscakir\MscBinance\Enums\RequestBodyFormat;
use Mscakir\MscBinance\Objects\BaseClientOptions;

abstract class BaseApiClient
{
    private ApiCredentials $apiCredentials;

    private AuthenticationProvider $authenticationProvider;

    private bool $created;

    public RequestBodyFormat $requestBodyFormat = RequestBodyFormat::Json;

    public bool $manuelParseError;

    public ArrayParametersSerialization $arraySerialization = ArrayParametersSerialization::Array;

    public string $requestBodyEmptyContent = "{}";

    /**
     * @return AuthenticationProvider
     */
    public function getAuthenticationProvider(): AuthenticationProvider
    {
        if (!$this->created) {
            $this->authenticationProvider = self::createAuthenticationProvider($this->apiCredentials);
            $this->created = true;
        }

        return $this->authenticationProvider;
    }

    /**
     * @param ApiCredentials $apiCredentials
     * @return AuthenticationProvider
     */
    protected abstract function createAuthenticationProvider(ApiCredentials $apiCredentials): AuthenticationProvider;

    protected string $baseAddress;

    public ApiClientOptions $options;

    /**
     * @param BaseClientOptions $options
     * @param ApiClientOptions $apiOptions
     */
    public function __construct(BaseClientOptions $options, ApiClientOptions $apiOptions)
    {
        $this->options = $apiOptions;
        $this->apiCredentials = $apiOptions->apiCredentials ?? $options->apiCredentials;
        $this->baseAddress = $apiOptions->baseAddress;
    }
}
