<?php

namespace Mscakir\MscBinance\Objects;

use Illuminate\Support\Collection;
use Mscakir\MscBinance\Logging\LogLevel;
use Psr\Log\LoggerInterface;

class BaseOptions
{
    private LogLevel $_logLevel = LogLevel::INFO;

    public LogLevel $logLevel;

    private Collection $_logWriters;

    /**
     * @var Collection<LoggerInterface> $logWriters
     */
    public Collection $logWriters;

    public bool $outputOriginalData = false;

    public function __get(string $name)
    {
        if ($name == 'logLevel') {
            $this->logLevel = $this->_logLevel;
        } else if($name == 'logWriters') {
            $this->logWriters = $this->_logWriters;
        }
    }

    public function __set(string $name, mixed $value)
    {
        if ($name == 'logLevel') {
            $this->_logLevel = $value;
        } else if($name == 'logWriters') {
            $this->_logWriters = $value;
        }
    }

    public function __construct()
    {
        $this->logLevel = LogLevel::INFO;
        $this->logWriters = new Collection();
    }

    /**
     * @param BaseOptions|null $baseOptions
     * @return BaseOptions|null
     */
    public function withBaseOptions(BaseOptions|null $baseOptions): BaseOptions|null
    {
        $instance = new self();
        if ($baseOptions == null) {
            return null;
        }

        $this->logLevel = $baseOptions->logLevel;
           $this->logWriters = $baseOptions->logWriters;
        $this->outputOriginalData = $baseOptions->outputOriginalData;

        return $instance;
    }

    public function __toString(): string
    {
        return sprintf("LogLevel: %s, Writers: %d, OutputOriginalData: %s", $this->logLevel->value, $this->logWriters->count(), $this->outputOriginalData);
    }
}
