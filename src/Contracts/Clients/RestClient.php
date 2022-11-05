<?php

namespace Mscakir\MscBinance\Contracts\Clients;

use Mscakir\MscBinance\Authentication\ApiCredentials;

interface RestClient
{

    /**
     * SetApiCredentials
     *
     * @param ApiCredentials $credentials
     * @return void
     */
    public function setApiCredentials(ApiCredentials $credentials): void;
}
