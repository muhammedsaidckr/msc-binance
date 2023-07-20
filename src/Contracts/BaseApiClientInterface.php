<?php

namespace Mscakir\MscBinance\Contracts;

use Mscakir\MscBinance\Authentication\ApiCredentials;

interface BaseApiClientInterface
{

    /**
     * Set the API credentials for this API Client
     *
     * @param  \Mscakir\MscBinance\Authentication\ApiCredentials  $credentials
     * @return void
     */
    public function setApiCredentials(ApiCredentials $credentials): void;
}