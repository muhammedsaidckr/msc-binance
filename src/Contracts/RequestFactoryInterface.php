<?php

namespace Mscakir\MscBinance\Contracts;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Mscakir\MscBinance\Objects\ApiProxy;
use Psr\Http\Message\RequestFactoryInterface as ExtendedRequestFactoryInterface;

interface RequestFactoryInterface extends ExtendedRequestFactoryInterface
{
    /**
     * Configure the requests created by this factory
     *
     * @param Carbon $requestTimeout
     * @param ApiProxy $proxy
     * @param Client|null $client
     * @return void
     */
    public function configureRequest(Carbon $requestTimeout, ApiProxy $proxy, Client $client = null) : void;
}
