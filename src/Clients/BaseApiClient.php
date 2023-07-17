<?php

namespace Mscakir\MscBinance\Clients;

use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Authentication\AuthenticationProvider;
use Mscakir\MscBinance\Enums\ArrayParametersSerialization;
use Mscakir\MscBinance\Enums\RequestBodyFormat;
use Mscakir\MscBinance\Objects\Options\BaseClientOptions;

abstract class BaseApiClient
{
    private ApiCredentials|null $_apiCredentials;

    private AuthenticationProvider|null $_authenticationProvider;

    private bool $_created;

    /**
     * The authentication provider for this API client. (null if no credentials are set)
     *
     * @var AuthenticationProvider $authenticationProvider
     */
    public AuthenticationProvider $authenticationProvider;

    /**
     * Request body content type
     *
     * @var RequestBodyFormat $requestBodyFormat
     */
    public RequestBodyFormat $requestBodyFormat = RequestBodyFormat::Json;

    /**
     * Whether we need to manually parse an error instead of relying on the http status code
     *
     * @var bool $manuelParseError
     */
    public bool $manuelParseError = false;

    /**
     * How to serialize array parameters when making requests
     *
     * @var ArrayParametersSerialization $arraySerialization
     */
    public ArrayParametersSerialization $arraySerialization = ArrayParametersSerialization::Array;

    /**
     * What request body should be set when no data is send (only used in combination with Post InBody)
     *
     * @var string $requestBodyEmptyContent
     */
    public string $requestBodyEmptyContent = "{}";

    /**
     * The base address for this API client
     *
     * @var string $baseAddress
     */
    protected string $baseAddress;

    /**
     * Api client options
     *
     * @var ApiClientOptions $options
     */
    public ApiClientOptions $options;

    /**
     * @param BaseClientOptions $options
     * @param ApiClientOptions $apiOptions
     */
    public function __construct(BaseClientOptions $options, ApiClientOptions $apiOptions)
    {
        $this->options = $apiOptions;
        $this->_apiCredentials = clone $apiOptions->apiCredentials ?? clone $options->apiCredentials;
        $this->baseAddress = $apiOptions->baseAddress;
    }

    /**
     * Creates an AuthenticationProvider implementation instance based on the provided credentials
     *
     * @param ApiCredentials $apiCredentials
     * @return AuthenticationProvider
     */
    protected abstract function createAuthenticationProvider(ApiCredentials $apiCredentials): AuthenticationProvider;

    /**
     * @param string $name
     * @return AuthenticationProvider|void
     */
    public function __get(string $name)
    {
        if ($name == "authenticationProvider") {
            if (!$this->_created && $this->_apiCredentials != null) {
                $this->_authenticationProvider = $this->createAuthenticationProvider($this->_apiCredentials);
                $this->_created = true;
            }
            return $this->_authenticationProvider;
        }
    }

    /**
     * magic set
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value)
    {
        if($name == "apiCredentials") {
            $this->_apiCredentials = $value instanceof ApiCredentials ? clone $value : null;
            $this->_created = false;
            $this->_authenticationProvider = null;
        }
    }
}
