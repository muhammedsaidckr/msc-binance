<?php

namespace Mscakir\MscBinance\Tests;

use Mscakir\MscBinance\Clients\BaseClient;
use Mscakir\MscBinance\Objects\BaseClientOptions;

class TestBaseClient extends BaseClient
{
    public function __construct(string $name = "", BaseClientOptions $options)
    {
        parent::__construct("Test", $options);
    }

    public function Log(string $verbosity, string $data)
    {
        $this->log->write($verbosity, $data);
    }
}
