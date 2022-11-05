<?php

namespace Mscakir\MscBinance\Objects;

use Mscakir\MscBinance\Authentication\ApiCredentials;

class BaseClientOptions
{
    public ApiProxy $proxy;

    public ApiCredentials $apiCredentials;

    public function __construct()
    {
    }

    /**
     * @param BaseClientOptions|null $baseOptions
     * @return void
     */
    public function withBaseOptions(BaseClientOptions $baseOptions = null) : void
    {
        $instance = new self();
        if($baseOptions == null) {
            return;
        }
        $this->proxy = $baseOptions->proxy;
        $this->apiCredentials = $baseOptions->apiCredentials;
    }
}
