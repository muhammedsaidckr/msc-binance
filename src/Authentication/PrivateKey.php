<?php

namespace Mscakir\MscBinance\Authentication;

use Mscakir\MscBinance\Helpers\SecureString;
use Exception;

class PrivateKey
{
    /**
     * The private key
     * @var string|SecureString $key
     */
    public string|SecureString $key;

    /**
     * The private key's pass phrase
     * @var string|SecureString $passphrase
     */
    public string|SecureString $passphrase;

    /**
     * Indicates if the private key is encrypted or not
     * @var bool $isEncrypted
     */
    public bool $isEncrypted;

    /**
     * @throws Exception
     */
    public function __construct(string|SecureString $key, string|SecureString $passphrase)
    {
        if (typeOf($key) == SecureString::class && typeOf($passphrase) == SecureString::class) {
            $this->key = $key;
            $this->passphrase = $passphrase;

            $this->isEncrypted = true;
        } else {
            self::withSecureStringKey($key, $passphrase);
        }
    }

    /**
     * @param string $key
     * @param string $passphrase
     * @return void
     * @throws Exception
     */
    public function withSecureStringKey(string $key, string $passphrase) : void
    {
        if(isEmptyOrNullString($key) || isEmptyOrNullString($passphrase)) {
            throw new Exception("Key and passphrase can't be null/empty");
        }
        $secureKey = new SecureString();
        $secureKey->encode($key, ["hsha1" => SecureString::generateRandomKey(10)]);
        $this->key = $secureKey;

        $securePassphrase = new SecureString();
        $secureKey->encode($passphrase, ["hsha1" => SecureString::generateRandomKey(10)]);
        $this->passphrase = $securePassphrase;

        $this->isEncrypted = true;

    }
}
