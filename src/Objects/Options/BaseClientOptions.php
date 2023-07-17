<?php

namespace Mscakir\MscBinance\Objects\Options;

use Mscakir\MscBinance\Authentication\ApiCredentials;
use Mscakir\MscBinance\Objects\ApiProxy;

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
     * @return BaseClientOptions|null
     */
    public function withBaseOptions(BaseClientOptions|BaseOptions $baseOptions = null): BaseClientOptions|null
    {
        $instance = new self();
        if ($baseOptions == null) {
            return null;
        }
        $this->proxy = $baseOptions->proxy;
        $this->apiCredentials = $baseOptions->apiCredentials;
        return $instance;
    }
}
