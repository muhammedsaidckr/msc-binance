<?php

namespace Mscakir\MscBinance\Objects;

class DeserializerError extends Error {
    /**
     * @param string $message
     * @param object|null|string $data
     */
    public function __construct(string $message, object|string|null $data)
    {
        parent::__construct(null, $message, $data);
    }
}
