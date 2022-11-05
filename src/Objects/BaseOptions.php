<?php

namespace Mscakir\MscBinance\Objects;

use Illuminate\Support\Collection;
use Psr\Log\LogLevel;

class BaseOptions
{
    private LogLevel|string $_logLevel = LogLevel::INFO;

    public LogLevel|string $logLevel;

    private Collection $_logWriters;

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
    }

    /**
     * @param BaseOptions|null $baseOptions
     * @return BaseOptions|void
     */
    public function withBaseOptions(BaseOptions|null $baseOptions): BaseOptions|null
    {
        $instance = new self();
        if ($baseOptions == null) {
            return;
        }

        $this->logLevel = $baseOptions->logLevel;
           $this->logWriters = $baseOptions->logWriters;
        $this->outputOriginalData = $baseOptions->outputOriginalData;

        return $instance;
    }

    public function __toString(): string
    {
        return sprintf("LogLevel: %s, Writers: %d, OutputOriginalData: %s", $this->logLevel, $this->logWriters->count(), $this->outputOriginalData);
    }
}
