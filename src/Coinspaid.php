<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;


/**
 * @method static ?Response run()
 * @method static ?Response ping()
 * @method static ?Response request(?string $pathName = null, ?string $method = null, ?array $parameters = [], ?array $headers = [])
 * @method static ?Response getListCurrencies(?bool $visible = null)
 * @method static ?Response getListCurrencyPairs(?string $currencyFrom = null, ?string $currencyTo = null)
 * @method static ?Response getListCurrenciesRates(?string $currencyFrom = null, ?string $currencyTo = null)
 * @method static ?Response getListBalances()
 * @method static ?Response receiveCryptocurrency(string $foreignId, string $currency, ?string $convertTo = null)
 * @method static ?Response withdrawCryptocurrency(string $foreignId, string $amount, string $currency, string $address, ?string $convertTo = null, string $tag = null)
 * @method static ?Response exchangeCalculate(string $senderCurrency, string $receiverCurrency, ?string $senderAmount = null, ?string $receiverAmount)
 * @method static ?Response exchangeFixed(string $foreignId, string $senderCurrency, string $receiverCurrency, string $senderAmount, string $price)
 * @method static ?Response exchangeNow(string $foreignId, string $senderCurrency, string $receiverCurrency, string $senderAmount)
 * @method static ?Response futuresRates(string $address)
 * @method static ?Response futuresConfirm(string $address, string $senderCurrency, string $receiverCurrency, string $receiverAmount)
 * @method static ?Response createInvoices(string $foreignId, string $currency, float $amount, string $title, bool $timer, string $urlSuccess, string $urlFailed, string $emailUser, ?string $senderCurrency = null, ?string $description = null)
 */

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

    static public function __callStatic($method, $arguments): ?Response
    {
        return self::api()->$method(...$arguments);
    }
}
