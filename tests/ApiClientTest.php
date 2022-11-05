<?php

namespace Mscakir\MscBinance\Tests;

use Mscakir\MscBinance\MscBinance;
use Mscakir\MscBinance\Objects\BaseRestClientOptions;

class ApiClientTest extends TestCase
{
    public function test_create_api_client()
    {
        $apiClient = new TestBaseClient(options: new BaseRestClientOptions());

        $this->assertTrue(true);
    }
}
