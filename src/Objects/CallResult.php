<?php

namespace Mscakir\MscBinance\Objects;

class CallResult
{
    /**
     * An error if the call didn't succeed, will always be filled if success = false
     *
     * @var Error $error
     */
    public Error $error;

    /**
     * Whether the call was successful
     *
     * @var bool $success
     */
    public bool $success;

    /**
     * The data returned by the call, only available when success = true
     *
     * @var mixed $data
     */
    public mixed $data;

    /**
     * The original data returned by the call, only available when `OutputOriginalData` is set to `true` in the client opt
     *
     * @var string|null $originalData
     */
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
    public function withData(mixed $data, $originalData = null, $error = null): CallResult
    {
        $instance = new self();
        $this->withDataAndError($data, $originalData, $error);
        return $instance;
    }

    /**
     * Whether the call was successful or not. Useful for nullability check.
     *
     * @param mixed $data           The data returned by call.
     * @param Error|null $error     on failure.
     * @return bool                 true when CallResult succeeded, false otherwise.
     */
    public function getResultOrError(mixed &$data, Error|null &$error): bool
    {
        if ($this->success) {
            $data = $this->data;
            $error = null;

            return true;
        } else {
            $data = null;
            $error = $this->error;

            return false;
        }
    }
}
