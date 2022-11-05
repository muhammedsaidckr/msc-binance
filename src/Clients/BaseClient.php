<?php

namespace Mscakir\MscBinance\Clients;

use Carbon\Traits\Localization;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use JsonSerializable;
use DateTimeZone;
use Mscakir\MscBinance\Objects\BaseClientOptions;
use Mscakir\MscBinance\Objects\CallResult;
use Mscakir\MscBinance\Objects\DeserializerError;
use Psr\Log\LogLevel;

abstract class BaseClient
{
    /**
     * The log object
     *
     * @var Log
     */
    protected Log $log;

    /**
     * The last used id, use NextId() to get the next id and up this
     * @var int
     */
    protected static int $lastId;

    protected static object $idLock;

    public string $name;

    public Collection $apiClients;

    public BaseClientOptions $clientOptions;

    protected function __construct(string $name, BaseClientOptions $options)
    {
        $this->log = new Log($name);
        $this->clientOptions = $options;
        $this->name = $name;
        $this->log->write(LogLevel::EMERGENCY, sprintf("Client configuration: %s, MscExchange: v%s", (object)$options, app(BaseClient::class)->version()));
    }

    /**
     * @param BaseApiClient $apiClient
     * @return BaseApiClient
     */
    protected function AddApiClient(BaseApiClient $apiClient): BaseApiClient
    {
        $this->log->write(LogLevel::EMERGENCY, sprintf("%s configuration : %s", (object)gettype($apiClient), (object)$apiClient->options));
        $this->apiClients->add($apiClient);
        return $apiClient;
    }

    /**
     * @param string $data
     * @return CallResult
     */
//    protected function validateJson(string $data) : CallResult
//    {
//        $callResult = new CallResult();
//        if(isEmptyOrNullString($data)) {
//            $info = "Empty data object received";
//            $this->log->write(LogLevel::ERROR, $info);
//            return new $callResult->withError(new DeserializerError($info, $data));
//        }
//    }
}
