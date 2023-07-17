<?php

namespace Mscakir\MscBinance\Clients;

use DateInterval;
use DateTimeZone;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;
use Mscakir\MscBinance\Objects\Options\BaseClientOptions;
use Mscakir\MscBinance\Objects\Options\RestApiClientOptions;
use Mscakir\MscBinance\Objects\TimeSyncInfo;
use Psr\Http\Message\ResponseInterface;

abstract class RestApiClient extends BaseApiClient
{
    /**
     * GetTimeSyncInfo
     *
     * @return TimeSyncInfo
     */
    public abstract function getTimeSyncInfo(): TimeSyncInfo;

    /**
     * GetTimeOffset
     *
     * @return int
     */
    public abstract function getTimeOffset(): int;

    /**
     * @var int $totalRequestsMade
     */
    public int $totalRequestsMade;

    /**
     * @var RestApiClientOptions|ApiClientOptions
     */
    public RestApiClientOptions|ApiClientOptions $options;

    /**
     * @var Collection
     */
    protected Collection $rateLimiters;

    public function __construct(BaseClientOptions $options, RestApiClientOptions $apiOptions)
    {
        parent::__construct($options, $apiOptions);

        $rateLimiterList = new Collection();
        foreach ($apiOptions->rateLimiters as $rateLimiter) {
            $rateLimiterList->add($rateLimiter);
        }

        $this->rateLimiters = $rateLimiterList;
    }

    /**
     * GetServerTimestampAsync
     *
     * @return ResponseInterface
     */
    protected abstract function getServerTimestampAsync(): ResponseInterface;

    public function syncTimeAsync(): ResponseInterface
    {
        $timeSyncParams = $this->getTimeSyncInfo();

        if (! $timeSyncParams->syncTime
            || DateInterval::createFromDateString(now(DateTimeZone::UTC))
            - DateInterval::createFromDateString($timeSyncParams->timeSyncState->lastSyncTime)
            < $timeSyncParams->recalculationInterval) {
            return new Response(body: true);
        }

        $localTime = now(DateTimeZone::UTC);
        $response = $this->getServerTimestampAsync();
        if ($response->getStatusCode() == 200) {
            return new Response(body: true);
        }

        if ($this->totalRequestsMade == 1) {
            $localTime = now(DateTimeZone::UTC);
            $response = $this->getServerTimestampAsync();
            if ($response->getStatusCode() == 200) {
                return new Response(body: true);
            }
        }

        return new Response(body: true);
    }
}
