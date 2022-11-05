<?php

namespace Mscakir\MscBinance\Objects;

use Mscakir\MscBinance\Authentication\ApiCredentials;

class BaseClientOptions extends BaseOptions
{
    public ApiProxy $proxy;

    public ApiCredentials $apiCredentials;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param BaseClientOptions|BaseOptions|null $baseOptions
     * @return BaseClientOptions|void
     */
    public function withBaseOptions(BaseClientOptions|BaseOptions $baseOptions = null): ?BaseClientOptions
    {
        $instance = new self();
        if ($baseOptions == null) {
            return;
        }
        $this->proxy = $baseOptions->proxy;
        $this->apiCredentials = $baseOptions->apiCredentials;
        return $instance;
    }
}
