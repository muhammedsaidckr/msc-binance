<?php

namespace Mscakir\MscBinance\Contracts\Clients;

use Mscakir\MscBinance\Authentication\ApiCredentials;

interface RestClientInterface
{

    /**
     * SetApiCredentials
     *
     * @param ApiCredentials $credentials
     * @return void
     */
    public function setApiCredentials(ApiCredentials $credentials): void;
}
