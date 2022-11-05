<?php
declare(strict_types = 1);

namespace Mscakir\MscBinance\Contracts\Clients;

use Mscakir\MscBinance\Authentication\ApiCredentials;
use Psr\Http\Message\ResponseInterface;

interface BinanceClient
{
    /**
     * Set the API credentials for this client. All Api clients in this client will use the new credentials,
     * regardless of earlier set options.
     *
     * @param ApiCredentials $credentials
     * @return void
     */
    public function setApiCredentials(ApiCredentials $credentials) : void;
}
