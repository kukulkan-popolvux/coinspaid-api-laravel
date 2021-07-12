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
     * @return object
     */
    public function getBodyObject(): object
    {
        return \GuzzleHttp\json_decode($this->body);
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
}
