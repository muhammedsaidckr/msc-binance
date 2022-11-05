<?php

namespace Mscakir\MscBinance\Objects;

class CallResult
{
    public Error $error;

    public bool $success;

    public mixed $data;

    public string|null $originalData;

    public function __construct()
    {
    }

    /**
     * withError
     *
     * @param Error|null $error
     * @return CallResult
     */
    public function withError(Error|null $error): CallResult
    {
        $instance = new self();
        $this->error = $error;
        return $instance;
    }

    /**
     * @param mixed $data
     * @param string|null $originalData
     * @param Error|null $error
     * @return CallResult
     */
    protected function withDataAndError(mixed $data, string|null $originalData, Error|null $error): CallResult
    {
        $instance = new self();
        $this->data = $data;
        $this->originalData = $originalData;
        $this->error = $error;
        return $instance;
    }

    /**
     * @param mixed $data
     * @param null $originalData
     * @param null $error
     * @return CallResult
     */
    public function withData(mixed $data, $originalData = null, $error = null) : CallResult
    {
        $instance = new self();
        $this->withDataAndError($data, $originalData, $error);
        return $instance;
    }
}
