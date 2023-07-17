<?php

namespace Mscakir\MscBinance\Contracts;

interface BaseApiClientInterface
{

    /**
     * Set the API credentials for this API Client
     *
     * @param  <\Mscakir\MscBinance\Authentication\ApiCredentials>  $credentials
     * @return void
     */
    public function setApiCredentials($credentials): void;
}