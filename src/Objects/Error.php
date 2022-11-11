<?php

namespace Mscakir\MscBinance\Objects;

abstract class Error
{
    /**
     * The error code from the server
     *
     * @var int|null
     */
    public int|null $code;

    /**
     * The message for the error that occured
     *
     * @var string
     */
    public string $message;

    /**
     * The data which caused the error
     *
     * @var object|null|string $data
     */
    public object|null|string $data;

    protected function __construct(int|null $code, string $message, object|null|string $data)
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }
}

