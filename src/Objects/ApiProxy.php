<?php

namespace Mscakir\MscBinance\Objects;

class ApiProxy
{
    /**
     * The host address of the proxy
     *
     * @var string
     */
    public string $host;

    /**
     * The port of the proxy
     *
     * @var int
     */
    public int $port;

    /**
     * The login of the proxy
     *
     * @var string|null
     */
    public string|null $login;

    /**
     * The password of the proxy
     *
     * @var string|null
     */
    public string|null $password;

    public function __construct(string $host, int $port)
    {
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * Create new settings for a proxy
     *
     * @param string $host
     * @param int $port
     * @param string $login
     * @param string $password
     * @return ApiProxy
     */
    public function withLoginAndPassword(string $host, int $port, string $login, string $password) : ApiProxy
    {
        $instance = new self($host, $port);
        $instance->login = $login;
        $instance->password = $password;
        return $instance;
    }
}
