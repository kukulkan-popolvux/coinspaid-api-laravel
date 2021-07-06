<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;


use KukulkanPopolvux\CoinspaidApiLaravel\{Builder, Basic, Api};

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
     * @return string
     */
    static public function run():string
    {
        return self::basic()::run();
    }

    /**
     *
     * @param string|null $pathName
     * @param string|null $method
     * @param array|null $parameters
     * @param array|null $headers
     * @return string
     */
    static public function request(?string $pathName = null, ?string $method = null, ?array $parameters = [], ?array $headers = []):string
    {
        return self::basic()->request($pathName, $method, $parameters, $headers);
    }

    /**
     * Ping
     *
     * Test if API is up and running and your authorization is working
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#ping
     *
     * @return string
     */
    static public function ping():string
    {
        return self::api()->ping();
    }

    /**
     * Get list of supported currencies
     *
     * Get a list of all supported currencies
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-supported-currencies
     *
     * @param boolean|null $visible
     * @return string
     */
    static public function getListCurrencies(?bool $visible = null):string
    {
        return self::api()->getListCurrencies($visible);
    }

    /**
     * Get list of exchangeable currency pairs
     *
     * Get list of currency exchange pairs
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-exchangeable-currency-pairs
     *
     * @param string|null $currencyFrom
     * @param string|null $currencyTo
     * @return string
     */
    static public function getListCurrencyPairs(?string $currencyFrom = null, ?string $currencyTo = null):string
    {
        return self::api()->getListCurrencyPairs($currencyFrom, $currencyTo);
    }

    /**
     * Get list of currencies rates
     *
     * Get a particular pair and its price
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-currencies-rates
     *
     * @param string|null $currencyFrom
     * @param string|null $currencyTo
     * @return string
     */
    static public function getListCurrenciesRates(?string $currencyFrom = null, ?string $currencyTo = null):string
    {
        return self::api()->getListCurrenciesRates($currencyFrom, $currencyTo);
    }

    /**
     * Get list of balances
     *
     * Get list of all the balances (including zero balances)
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-balances
     *
     * @return string
     */
    static public function getListBalances():string
    {
        return self::api()->getListBalances();
    }

    /**
     * Receive cryptocurrency
     *
     * Take address for depositing crypto and (it depends on specified params) exchange from crypto to fiat on-the-fly.
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#receive-cryptocurrency
     *
     * @param string $foreignId
     * @param string $currency
     * @param string|null $convertTo
     * @return string
     */
    static public function receiveCryptocurrency(string $foreignId, string $currency, ?string $convertTo = null):string
    {
        return self::api()->receiveCryptocurrency($foreignId, $currency, $convertTo);
    }

    /**
     * Withdraw cryptocurrency
     *
     * Withdraw in crypto to any specified address. You can send Cryptocurrency from your Fiat currency balance by using "convert_to" parameter.
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#withdraw-cryptocurrency
     *
     * @param string $foreignId
     * @param string $amount
     * @param string $currency
     * @param string $address
     * @param string|null $convertTo
     * @param string $tag
     * @return string
     */
    static public function withdrawCryptocurrency(
        string $foreignId,
        string $amount,
        string $currency,
        string $address,
        ?string $convertTo = null,
        string $tag = null
    ):string {
        return self::api()->withdrawCryptocurrency($foreignId, $amount, $currency, $address, $convertTo, $tag);
    }

    /**
     * Calculate exchange rates
     *
     * Get info about exchange rates.
     *
     * Please note, this endpoint has limitation up to 30 requests per minute from one IP address, in case this amount is
     * exceeded a new successful response can only be obtained after one minute break.
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#calculate-exchange-rates
     *
     * @param string $senderCurrency
     * @param string $receiverCurrency
     * @param string|null $senderAmount
     * @param string|null $receiverAmount
     * @return string
     */
    static public function exchangeCalculate(
        string $senderCurrency,
        string $receiverCurrency,
        ?string $senderAmount = null,
        ?string $receiverAmount
    ):string {
        return self::api()->exchangeCalculate($senderCurrency, $receiverCurrency, $senderAmount, $receiverAmount);
    }

    /**
     * Exchange on fixed exchange rate
     *
     * Make exchange on a given fixed exchange rate
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#exchange-on-fixed-exchange-rate
     *
     * @param string $foreignId
     * @param string $senderCurrency
     * @param string $receiverCurrency
     * @param string $senderAmount
     * @param string $price
     * @return string
     */
    static public function exchangeFixed(
        string $foreignId,
        string $senderCurrency,
        string $receiverCurrency,
        string $senderAmount,
        string $price
    ):string {
        return self::api()->exchangeFixed($foreignId, $senderCurrency, $receiverCurrency, $senderAmount, $price);
    }

    /**
     * Exchange regardless the exchange rate
     *
     * Make exchange without mentioning the price
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#exchange-regardless-the-exchange-rate
     *
     * @param string $foreignId
     * @param string $senderCurrency
     * @param string $receiverCurrency
     * @param string $senderAmount
     * @return string|null
     */
    static public function exchangeNow(string $foreignId, string $senderCurrency, string $receiverCurrency, string $senderAmount):string
    {
        return self::api()->exchangeNow($foreignId, $senderCurrency, $receiverCurrency, $senderAmount);
    }

    /**
     * Calculate rates for futures
     *
     * Get info about rates for futures
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#calculate-rates-for-futures
     *
     * @param string $address
     * @return string
     */
    static public function futuresRates(string $address):string
    {
        return self::api()->futuresRates($address);
    }

    /**
     * Confirm futures transaction
     *
     * Confirm futures transaction
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#confirm-futures-transaction
     *
     * @param string $address
     * @param string $senderCurrency
     * @param string $receiverCurrency
     * @param string $receiverAmount
     * @return string|null
     */
    static public function futuresConfirm(string $address, string $senderCurrency, string $receiverCurrency, string $receiverAmount):string
    {
        return self::api()->futuresConfirm($address, $senderCurrency, $receiverCurrency, $receiverAmount);
    }

    /**
     * Create Invoice
     *
     * Create invoice for the client for a specified amount.
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#create-invoice
     *
     * @param string $foreignId
     * @param string $currency
     * @param float $amount
     * @param string $title
     * @param boolean $timer
     * @param string $urlSuccess
     * @param string $urlFailed
     * @param string $emailUser
     * @param string|null $senderCurrency
     * @param string|null $description
     * @return string
     */
    static public function createInvoices(
        string $foreignId,
        string $currency,
        float $amount,
        string $title,
        bool $timer,
        string $urlSuccess,
        string $urlFailed,
        string $emailUser,
        ?string $senderCurrency = null,
        ?string $description = null
    ):string {
        return self::api()->createInvoices($foreignId, $currency, $amount, $title, $timer, $urlSuccess, $urlFailed, $emailUser, $senderCurrency, $description);
    }
}
