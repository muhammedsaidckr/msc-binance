<?php

namespace Mscakir\MscBinance\Authentication;

use Exception;

abstract class AuthenticationProvider
{
    protected string $sBytes;

    public ApiCredentials $credentials;

    /**
     * @param ApiCredentials $credentials
     * @throws Exception
     */
    protected function __construct(ApiCredentials $credentials)
    {
        $this->credentials = $credentials->secret != null ? $credentials : throw new Exception("ApiKey/Secret needed");
        $this->sBytes = pack('C*', utf8_encode($credentials->secret));
    }
}
