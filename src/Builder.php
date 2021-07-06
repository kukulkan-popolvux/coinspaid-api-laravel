<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;


class Builder
{
    const HASH_ALGO = 'sha512';

    const DOMAINS_DEFAULT = [
        'prod' => 'https://app.cryptoprocessing.com/api/v2',
        'test' => 'https://app.sandbox.cryptoprocessing.com/api/v2',
    ];

    protected $environment;
    protected $apiKey;
    protected $secretKey;
    protected $domain;

    protected $parameters;
    protected $requestBody;
    protected $requestData;
    protected $signature;

    protected $url;
    protected $method;
    protected $pathName;
    protected $headers;

    protected $response;
    protected $httpCode;

    /**
     * Get property environment
     *
     * @return string|null
     */
    public function getEnvironment(): ?string
    {
        return $this->environment ?? 'prod';
    }

    /**
     * Set property environment
     *
     * @param string|null $environment
     * @return self
     */
    public function setEnvironment(?string $environment = null): self
    {
        $this->environment = $environment ?? config('coinspaid.environment', 'prod');

        return $this;
    }

    /**
     * Get property apiKey
     *
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    /**
     * Set property apiKey
     *
     * @param string|null $apiKey
     * @return self
     */
    public function setApiKey(?string $apiKey = null): self
    {
        $this->apiKey = $apiKey ?? config('coinspaid.api_key', '');

        return $this;
    }

    /**
     * Get property secretKey
     *
     * @return string|null
     */
    private function getSecretKey(): ?string
    {
        return $this->secretKey;
    }

    /**
     * Set property secretKey
     *
     * @param string|null $secretKey
     * @return self
     */
    public function setSecretKey(?string $secretKey = null): self
    {
        $this->secretKey = $secretKey ?? config('coinspaid.key', '');

        return $this;
    }

    /**
     * Get property domain
     *
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * Set property domain
     *
     * @param string|null $domain
     * @return self
     */
    public function setDomain(?string $domain = null): self
    {
        $this->domain = $domain ?? config('coinspaid.domains.' . $this->getEnvironment(), self::DOMAINS_DEFAULT[$this->getEnvironment()]);

        return $this;
    }

    /**
     * Get property parameters
     *
     * @return array|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters ?? [];
    }

    /**
     * Set property parameters
     *
     * @param array|null $parameters
     * @return self
     */
    public function setParameters(?array $parameters): self
    {
        $this->parameters = $parameters ?? [];

        return $this;
    }

    /**
     * Get property requestData
     *
     * @return array|null
     */
    public function getRequestData(): ?array
    {
        return $this->requestData ?? [];
    }

    /**
     * Set property requestData
     *
     * @param array|null $requestData
     * @return self
     */
    public function setRequestData(?array $requestData = null): self
    {
        $this->requestData = $requestData ?? [];

        return $this;
    }

    /**
     * Get property requestData, only one value
     *
     * @param string $key
     * @param string $default
     * @return string|array
     */
    public function getRequestDataOnly(string $key, $default = '')
    {
        return $this->requestData[$key] ?? $default;
    }

    /**
     * Get property requestBody
     *
     * @return string|null
     */
    public function getRequestBody(): ?string
    {
        return $this->requestBody;
    }

    /**
     * Set property requestBody
     *
     * @return self
     */
    public function setRequestBody(): self
    {
        $this->requestBody = json_encode($this->getParameters());

        return $this;
    }

    /**
     * Get property signature
     *
     * @return string|null
     */
    public function getSignature(): ?string
    {
        return $this->signature;
    }

    /**
     * Set property signature
     *
     * @return self
     */
    public function setSignature(): self
    {
        $this->signature = hash_hmac(self::HASH_ALGO, $this->getRequestBody(), $this->getSecretKey());

        return $this;
    }

    /**
     * Get property response
     *
     * @return string|null
     */
    public function getResponse(): ?string
    {
        return $this->response;
    }

    /**
     * Set property response
     *
     * @param string $response
     * @return self
     */
    public function setResponse(string $response): self
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get property httpCode
     *
     * @return integer|null
     */
    public function getHttpCode(): ?int
    {
        return $this->httpCode;
    }

    /**
     * Set property httpCode
     *
     * @param string $httpCode
     * @return self
     */
    public function setHttpCode(string $httpCode): self
    {
        $this->httpCode = $httpCode;

        return $this;
    }

    /**
     * Get property pathName
     *
     * @return string|null
     */
    public function getPathName(): ?string
    {
        return $this->pathName;
    }

    /**
     * Set property pathName
     *
     * @param string|null $pathName
     * @return self
     */
    public function setPathName(?string $pathName = null): self
    {
        $this->pathName = $pathName ?? 'ping';

        return $this;
    }

    /**
     * Get property url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set property url
     *
     * @param string|null $url
     * @return self
     */
    public function setUrl(?string $url = null): self
    {
        $this->url = $url ?? $this->getDomain() . '/' . $this->getPathName();

        return $this;
    }

    /**
     * Get property method
     *
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * Set property method
     *
     * @param string|null $method
     * @return self
     */
    public function setMethod(?string $method = null): self
    {
        $this->method = $method ?? 'get';

        return $this;
    }

    /**
     * Get property headers
     *
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers ?? [];
    }

    /**
     * Set property headers
     *
     * @param array|null $headers
     * @return self
     */
    public function setHeaders(?array $headers = null): self
    {
        $this->headers = $headers ?? [];

        return $this;
    }

    /**
     * Get parameter from parameters property
     *
     * @param string $key
     * @param [type] $default
     * @return string|null
     */
    public function getParameter(string $key, $default = null): ?string
    {
        return $this->parameters[$key] ?? $default;
    }

    /**
     * Add parameter to parameters property
     *
     * @param string $key
     * @param string|null $value
     * @return self
     */
    public function addParameter(string $key, ?string $value = null): self
    {
        if (!empty($value)) {
            $this->parameters[$key] = $value;
        }

        return $this;
    }

    /**
     * Checking a parameter by key in the parameters property
     *
     * @param string $key
     * @return boolean
     */
    public function hasParameter(string $key): bool
    {
        return array_key_exists($key, $this->parameters);
    }

    /**
     * Changing a parameter in the parameters property
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setParameter(string $key, string $value): self
    {
        if ($this->hasParameter($key)) {
            $this->addParameter($key, $value);
        }

        return $this;
    }

    /**
     *  Get header from headers property
     *
     * @param string $key
     * @param [type] $default
     * @return string|null
     */
    public function getHeader(string $key, $default = null): ?string
    {
        return $this->headers[$key] ?? $default;
    }

    /**
     * Add header to headers property
     *
     * @param string $key
     * @param string|null $value
     * @return self
     */
    public function addHeader(string $key, ?string $value = null): self
    {
        if (!empty($value)) {
            $this->headers[$key] = $value;
        }

        return $this;
    }

    /**
     * Checking a header by key in the headers property
     *
     * @param string $key
     * @return boolean
     */
    public function hasHeader(string $key): bool
    {
        return array_key_exists($key, $this->headers);
    }

    /**
     * Changing a header in the headers property
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function setHeader(string $key, string $value): self
    {
        if ($this->hasHeader($key)) {
            $this->addHeader($key, $value);
        }

        return $this;
    }
}
