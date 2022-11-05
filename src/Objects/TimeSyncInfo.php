<?php

namespace Mscakir\MscBinance\Objects;

use DateTime;
use DateTimeZone;

class TimeSyncInfo
{
    /**
     * Should synchronize time
     *
     * @var bool $syncTime
     */
    public bool $syncTime;

    /**
     * Timestamp recalculation interval
     *
     * @var int $recalculationInterval
     */
    public int $recalculationInterval;

    /**
     * Time sync state for the API client
     *
     * @var TimeSyncState
     */
    public TimeSyncState $timeSyncState;

    public function __construct(bool $syncTime, int $recalculationInterval, TimeSyncState $timeSyncState)
    {
        $this->syncTime = $syncTime;
        $this->recalculationInterval = $recalculationInterval;
        $this->timeSyncState = $timeSyncState;
    }

    /**
     * @param int $offset
     * @return void
     */
    public function updateTimeOffset(int $offset) : void
    {
        $this->timeSyncState->lastSyncTime = now(DateTimeZone::UTC);
        if ($offset > 0.0 && $offset < 500.0) {
            $this->timeSyncState->timeOffset = now(DateTimeZone::UTC)->getOffset();
        }
        else {
            $this->timeSyncState->timeOffset = $offset;
        }
    }
}
