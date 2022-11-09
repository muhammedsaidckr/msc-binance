<?php

namespace Mscakir\MscBinance\Logging;

use DateTimeZone;
use Exception;
use Illuminate\Support\Collection;
use Psr\Log\LoggerInterface;

class Log
{
    /**
     * List of LoggerInterface implementations to forward the message to
     *
     * @var Collection<LoggerInterface> $writers
     */
    private Collection $writers;

    /**
     * @var LogLevel $level
     */
    public LogLevel $level = LogLevel::INFO;

    /**
     * Client name
     *
     * @var string $clientName
     */
    public string $clientName;

    public function __construct(string $clientName)
    {
        $this->clientName = $clientName;
        $this->writers = new Collection();
    }

    /**
     * @param Collection $textWriters
     * @return void
     */
    public function updateWriters(Collection $textWriters): void
    {
        $this->writers = $textWriters;
    }

    /**
     * @param LogLevel $logLevel
     * @param string $message
     * @return void
     */
    public function write(LogLevel $logLevel, string $message) : void
    {
        $logMessage = "Client Name $this->clientName, -10 | $message";
        foreach ($this->writers as $writer) {
            try {
                $writer->log($logLevel, $logMessage);
            } catch (Exception $e) {
                debug_zval_dump(sprintf("%s | Warning | Failed to write log to writer %s",
                    now(DateTimeZone::UTC), gettype($writer)));
            }
        }
    }
}
