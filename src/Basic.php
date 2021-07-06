<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;

use KukulkanPopolvux\CoinspaidApiLaravel\Builder;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\{Client, RequestOptions};
use GuzzleHttp\Exception\TransferException;

class Basic extends Builder
{
    /**
     *
     * @return string
     */
    static public function run():string
    {
        return (new static)->request();
    }

    /**
     *
     * @param string|null $pathName
     * @param string|null $method
     * @param array|null $parameters
     * @param array|null $headers
     * @return string
     */
    public function request(?string $pathName = null, ?string $method = null, ?array $parameters = [], ?array $headers = []):string
    {
        try {
            $response = $this->setBasicProperties()->setBasicDataRequest($pathName, $method, $parameters, $headers)->httpClient();

            $this->setResponse($response->getBody()->getContents())->setHttpCode($response->getStatusCode());
        } catch (TransferException $e) {
            Log::error($e->getMessage());

            $this->setResponse($e->getMessage())->setHttpCode($e->getCode());
        } finally {
            return json_encode(['code' => $this->getHttpCode(), 'response' => $this->getResponse()]);
        }
    }

    /**
     *
     * @return self
     */
    protected function setBasicProperties():self
    {
        return $this->setEnvironment($this->environment)
                    ->setApiKey($this->apiKey)
                    ->setSecretKey($this->secretKey)
                    ->setDomain($this->domain)
                    ->setParameters($this->parameters)
                    ->setRequestBody($this->requestBody)
                    ->setSignature($this->signature)
                    ->setMethod($this->method)
                    ->setHeaders($this->headers)
                    ->setPathName($this->pathName)
                    ->setUrl($this->url);
    }

    /**
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function httpClient(): \Psr\Http\Message\ResponseInterface
    {
        return (new Client())->request($this->getRequestDataOnly('method'), $this->getRequestDataOnly('url'), $this->getRequestDataOnly('options'));
    }

    /**
     *
     * @return array
     */
    private function basicHeaders():array
    {
        return $this->addHeader('X-Processing-Key', $this->getApiKey())->addHeader('X-Processing-Signature', $this->getSignature())->getHeaders();
    }

    /**
     *
     * @param string|null $pathName
     * @param string|null $method
     * @param array|null $parameters
     * @param array|null $headers
     * @return self
     */
    private function setBasicDataRequest(?string $pathName = null, ?string $method = null, ?array $parameters = [], ?array $headers = []):self
    {
        return $this->setRequestData([
            'method' => $this->setMethod($method ?? $this->method)->getMethod(),
            'url' => $this->setPathName($pathName ?? $this->pathName)->setUrl()->getUrl(),
            'options' => [
                RequestOptions::JSON => $this->setParameters(array_merge($this->getParameters(), $parameters))->getParameters(),
                RequestOptions::HEADERS => $this->setHeaders(array_merge($this->basicHeaders(), $headers))->getHeaders(),
            ],
        ]);
    }
}
