<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;

use Illuminate\Support\Facades\Log;
use GuzzleHttp\{Client, RequestOptions};
use GuzzleHttp\Exception\TransferException;
use KukulkanPopolvux\CoinspaidApiLaravel\{Builder, Response};

class Basic extends Builder
{
    /**
     *
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    static public function run(): ?Response
    {
        return (new static)->request();
    }

    /**
     *
     * @param string|null $pathName
     * @param string|null $method
     * @param array|null $parameters
     * @param array|null $headers
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function request(?string $pathName = null, ?string $method = null, ?array $parameters = [], ?array $headers = []): ?Response
    {
        try {
            $response = $this->setBasicProperties()->setBasicDataRequest($pathName, $method, $parameters, $headers)->httpClient();
            
            $this->setResponse(new Response(
                $response->getHeaders(),
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        } catch (TransferException $e) {
            $this->setResponse(new Response(
                $e->getResponse()->getHeaders(),
                $e->getResponse()->getStatusCode(),
                $e->getResponse()->getBody()->getContents(),
                $e->getMessage()
            ));

            report($e);
        } finally {
            return $this->getResponse();
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
