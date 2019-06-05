<?php

namespace Visterio\TransportClient;

class TransportClientResponse
{
    private $httpStatus;
    private $headers;
    private $body;

    /**
     * TransportClientResponse constructor.
     * @param int|null $httpStatus
     * @param array|null $headers
     * @param string|null $body
     */
    public function __construct(?int $httpStatus, ?array $headers, ?string $body)
    {
        $this->httpStatus = $httpStatus;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @return array|null
     */
    public function getHeader(): ?array
    {
        return $this->headers;
    }

    /**
     * @return int|null
     */
    public function getHttpStatus(): ?int
    {
        return $this->httpStatus;
    }
}