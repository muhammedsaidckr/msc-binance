<?php

namespace Mscakir\MscBinance\Objects;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Mscakir\MscBinance\Clients\ApiClientOptions;
use Mscakir\MscBinance\Enums\RateLimitingBehaviour;
use DateTimeZone;

class RestApiClientOptions extends ApiClientOptions
{
    public Collection $rateLimiters;

    public RateLimitingBehaviour $rateLimitingBehaviour = RateLimitingBehaviour::Wait;

    public bool $autoTimestamp;

    public Carbon $timetampRecalculationInterval;

    public function __construct()
    {
    }

    /**
     * @param string $baseAddress
     * @return RestApiClientOptions
     */
    public function withBaseAddress(string $baseAddress) : RestApiClientOptions
    {
        $instance = new self();
        parent::withBaseAddress($baseAddress);
        return $instance;
    }

    /**
     * @param RestApiClientOptions|ApiClientOptions $baseOn
     * @param RestApiClientOptions|ApiClientOptions|null $newValues
     * @return RestApiClientOptions
     */
    public function withApiClientOptions(RestApiClientOptions|ApiClientOptions $baseOn, RestApiClientOptions|ApiClientOptions $newValues = null) : RestApiClientOptions
    {
        $instance = new self();
        parent::withApiClientOptions($baseOn, $newValues);
        $this->rateLimitingBehaviour = $newValues != null ? $newValues->rateLimitingBehaviour : $baseOn->rateLimitingBehaviour;
        $this->autoTimestamp = $newValues != null ? $newValues->autoTimestamp : $baseOn->autoTimestamp;
        $this->timetampRecalculationInterval = $newValues != null ? $newValues->timetampRecalculationInterval : $baseOn->timetampRecalculationInterval;
        $this->rateLimiters = $newValues != null ? $newValues->rateLimiters : $baseOn->rateLimiters;
        return $instance;
    }
}
