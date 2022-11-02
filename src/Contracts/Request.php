<?php
declare(strict_types = 1);
namespace Mscakir\MscBinance\Contracts;

use Psr\Http\Message\ResponseInterface;

interface Request
{
    /**
     * Set string content
     *
     * @param string $data
     * @param string $contentType
     * @return void
     */
    public function setContent(string $data, string $contentType) : void;

    /**
     * Add a header to the request
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function addHeader(string $key, string $value) : void;

    /**
     * Get all headers
     *
     * @return array
     */
    public function getHeaders() : array;

    /**
     * Get the response
     *
     * @return ResponseInterface
     */
    public function getResponse() : ResponseInterface;

}
