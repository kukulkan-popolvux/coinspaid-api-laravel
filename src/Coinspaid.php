<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;


use KukulkanPopolvux\CoinspaidApiLaravel\{Builder, Basic, Api, Response};

final class Coinspaid
{
    /**
     * Get class instance object KukulkanPopolvux\CoinspaidApiLaravel\Builder
     *
     * @return Builder
     */
    static public function builder(): Builder
    {
        return new Builder;
    }

    /**
     * Get class instance object KukulkanPopolvux\CoinspaidApiLaravel\Basic
     *
     * @return Basic
     */
    static public function basic(): Basic
    {
        return new Basic;
    }

    /**
     * Get class instance object KukulkanPopolvux\CoinspaidApiLaravel\Api
     *
     * @return Api
     */
    static public function api(): Api
    {
        return new Api;
    }

    /**
     *
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    static public function run(): ?Response
    {
        return self::basic()::run();
    }

    /**
     *
     * @param string|null $pathName
     * @param string|null $method
     * @param array|null $parameters
     * @param array|null $headers
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    static public function request(?string $pathName = null, ?string $method = null, ?array $parameters = [], ?array $headers = []): ?Response
    {
        return self::basic()->request($pathName, $method, $parameters, $headers);
    }

    static public function __callStatic($method, $arguments)
    {
        return self::api()->$method(...$arguments);
    }
}
