<?php

namespace Mscakir\MscBinance\Model;

use Mscakir\MscBinance\Helpers\SecureString;
use Exception;

class ApiCredentials
{
    /**
     * The api key to authenticate requests
     * @var string $key
     */
    public string $key;

    /**
     * The api secret to authenticate requests
     * @var string $secret
     */
    public string $secret;

    /**
     * The private key to authenticate requests
     * @var PrivateKey $privateKey
     */
    public PrivateKey $privateKey;

    /**
     * Create Api credentials providing a private key for authentication
     *
     * @param PrivateKey $privateKey
     * @return void
     */
    public function createWithPrivateKey(PrivateKey $privateKey) : void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * Create Api credentials providing api key and secret key for authentication
     *
     * @param string $key
     * @param string $secret
     * @return void
     * @throws Exception
     */
    public function createWithApiAndSecretKey(string $key, string $secret) : void
    {
        if(isEmptyOrNullString($key) || isEmptyOrNullString($secret)) {
            throw new Exception("Key and secret can't be empty/null");
        }
        $secureKey = new SecureString();
        $this->key = $secureKey->encode($key, ["hsha1" => SecureString::generateRandomKey(10)]);

        $secureSecret = new SecureString();
        $this->secret = $secureSecret->encode($secret, ["hsha1" => SecureString::generateRandomKey(10)]);
    }
}
