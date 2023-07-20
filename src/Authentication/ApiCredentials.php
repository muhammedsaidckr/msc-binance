<?php

namespace Mscakir\MscBinance\Authentication;

use Mscakir\MscBinance\Helpers\SecureString;
use Exception;

class ApiCredentials
{
    /**
     * The api key to authenticate requests
     *
     * @var string $key
     */
    public string $key;

    /**
     * The api secret to authenticate requests
     *
     * @var string $secret
     */
    public string $secret;

    /**
     * The private key to authenticate requests
     *
     * @var PrivateKey $privateKey
     */
    public PrivateKey $privateKey;

    public function __construct()
    {
    }

    /**
     * Create Api credentials providing a private key for authentication
     *
     * @param  PrivateKey  $privateKey
     * @return ApiCredentials
     */
    public function createWithPrivateKey(PrivateKey $privateKey): ApiCredentials
    {
        $instance = new self();
        $instance->privateKey = $privateKey;
        return $instance;
    }

    /**
     * TODO: Add createWithStream constructor
     */

    /**
     * Create Api credentials providing api key and secret key for authentication
     *
     * @param  string  $key
     * @param  string  $secret
     * @return ApiCredentials
     * @throws Exception
     */
    public static function createWithApiAndSecretKey(string $key, string $secret): ApiCredentials
    {
        if (is_null($key) || is_null($secret)) {
            throw new Exception("Key and secret can't be empty/null");
        }
        $instance = new self();
        $secureKey = new SecureString();
        $instance->key = $secureKey->encode($key, ["hsha1" => SecureString::generateRandomKey(10)]);

        $secureSecret = new SecureString();
        $instance->secret = $secureSecret->encode($secret, ["hsha1" => SecureString::generateRandomKey(10)]);
        return $instance;
    }
}
