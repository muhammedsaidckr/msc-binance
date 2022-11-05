<?php

namespace Mscakir\MscBinance\Objects;

use Illuminate\Support\Carbon;

class TimeSyncState
{
    public string $apiName;

    public Carbon $lastSyncTime;

    public int $timeOffset;

    public function __construct(string $apiName)
    {
        $this->apiName = $apiName;
    }
}
