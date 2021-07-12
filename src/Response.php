<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;


class Response
{
    private $body;

    private $headers;

    private $code;

    private $message;

    public function __construct($headers = [], $code = null, $body = null,  string $message = '')
    {
        $this->setHeaders($headers)->setBody($body)->setCode($code)->setMessage($message);
    }

    /**
     * Get property headers
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers ?? [];
    }

    /**
     * Set property headers
     *
     * @param array $headers
     * @return self
     */
    public function setHeaders(array $headers = null): self
    {
        $this->headers = $headers ?? [];

        return $this;
    }

    /**
     * Get property body
     *
     * @param boolean $getObject
     * @return string|object|null
     */
    public function getBody(bool $getObject = false)
    {
        return $getObject ? $this->getBodyObject($this->body) : $this->body;
    }

    /**
     * Get property body in type object
     *
     * @param bool   $assoc   When true, returned objects will be converted
     * @return object|array
     */
    public function getBodyObject(bool $assoc = false)
    {
        return \GuzzleHttp\json_decode($this->body, $assoc);
    }

    /**
     * Set property body
     *
     * @param string $body
     * @return self
     */
    public function setBody(string $body = null): self
    {
        $this->body = $body ?? '';

        return $this;
    }

    /**
     * Get property code
     *
     * @return integer
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * Set property code
     *
     * @param integer $code
     * @return self
     */
    public function setCode(int $code = null): self
    {
        $this->code = $code ?? 0;

        return $this;
    }

    /**
     * Get property message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set property message
     *
     * @param string $message
     * @return self
     */
    public function setMessage(string $message = null): self
    {
        $this->message = $message ?? '';

        return $this;
    }

    /**
     * Returns the `data` value from the request response
     *
     * @param string $key
     * @return string|array|null
     */
    public function getData(string $key = null)
    {
        $body = $this->getBodyObject(true);

        return $body['data'][$key] ?? $body['data'] ?? null;
    }
}
