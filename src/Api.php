<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;


use KukulkanPopolvux\CoinspaidApiLaravel\{Basic, Response};

final class Api extends Basic
{
    /**
     * Pathname "Ping"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#ping
     */
    const PING = 'ping';

    /**
     * Pathname "Get list of supported currencies"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-supported-currencies
     */
    const LIST_CURRENCIES = 'currencies/list';

    /**
     * Pathname "Get list of exchangeable currency pairs"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-exchangeable-currency-pairs
     */
    const LIST_CURRENCY_PAIRS = 'currencies/pairs';

    /**
     * Pathname "Get list of currencies rates"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-currencies-rates
     */
    const LIST_CURRENCIES_RATES = 'currencies/rates';

    /**
     * Pathname "Get list of balances"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-balances
     */
    const LIST_BALANCES = 'accounts/list';

    /**
     * Pathname "Receive cryptocurrency"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#receive-cryptocurrency
     */
    const RECEIVE_CRYPTOCURRENCY = 'addresses/take';

    /**
     * Pathname "Withdraw cryptocurrency"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#withdraw-cryptocurrency
     */
    const WITHDRAW_CRYPTOCURRENCY = 'withdrawal/crypto';

    /**
     * Pathname "Calculate exchange rates"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#calculate-exchange-rates
     */
    const EXCHANGE_CALCULATE = 'exchange/calculate';

    /**
     * Pathname "Exchange on fixed exchange rate"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#exchange-on-fixed-exchange-rate
     */
    const EXCHANGE_FIXED = 'exchange/fixed';

    /**
     * Pathname "Exchange regardless the exchange rate"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#exchange-regardless-the-exchange-rate
     */
    const EXCHANGE_NOW = 'exchange/now';

    /**
     * Pathname "Calculate rates for futures"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#calculate-rates-for-futures
     */
    const FUTURES_RATES = 'futures/rates';

    /**
     * Pathname "Confirm futures transaction"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#confirm-futures-transaction
     */
    const FUTURES_CONFIRM = 'futures/confirm';

    /**
     * Pathname "Create Invoice"
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#create-invoice
     */
    const CREATE_INVOICES = 'invoices/create';

    /**
     * Ping
     *
     * Test if API is up and running and your authorization is working
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#ping
     *
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function ping(): ?Response
    {
        return $this->setMethod('get')->setPathName(self::PING)->request();
    }

    /**
     * Get list of supported currencies
     *
     * Get a list of all supported currencies
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-supported-currencies
     *
     * @param boolean|null $visible
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function getListCurrencies(?bool $visible = null): ?Response
    {
        return $this->setMethod('post')->setPathName(self::LIST_CURRENCIES)->addParameter('visible', (int) $visible, true)->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function getListCurrencyPairs(?string $currencyFrom = null, ?string $currencyTo = null): ?Response
    {
        return $this->setMethod('post')
                    ->setPathName(self::LIST_CURRENCY_PAIRS)
                    ->addParameter('currency_from', $currencyFrom)
                    ->addParameter('currency_to', $currencyTo)
                    ->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function getListCurrenciesRates(?string $currencyFrom = null, ?string $currencyTo = null): ?Response
    {
        return $this->setMethod('post')
                    ->setPathName(self::LIST_CURRENCIES_RATES)
                    ->addParameter('currency_from', $currencyFrom)
                    ->addParameter('currency_to', $currencyTo)
                    ->request();
    }

    /**
     * Get list of balances
     *
     * Get list of all the balances (including zero balances)
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-balances
     *
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function getListBalances(): ?Response
    {
        return $this->setMethod('post')->setPathName(self::LIST_BALANCES)->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function receiveCryptocurrency(string $foreignId, string $currency, ?string $convertTo = null): ?Response
    {
        return $this->setMethod('post')
                    ->setPathName(self::RECEIVE_CRYPTOCURRENCY)
                    ->addParameter('foreign_id', $foreignId)
                    ->addParameter('currency', $currency)
                    ->addParameter('convert_to', $convertTo)
                    ->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function withdrawCryptocurrency(
        string $foreignId,
        string $amount,
        string $currency,
        string $address,
        ?string $convertTo = null,
        string $tag = null
    ): ?Response {
        return $this->setMethod('post')
                    ->setPathName(self::WITHDRAW_CRYPTOCURRENCY)
                    ->addParameter('foreign_id', $foreignId)
                    ->addParameter('amount', $amount)
                    ->addParameter('currency', $currency)
                    ->addParameter('address', $address)
                    ->addParameter('convert_to', $convertTo)
                    ->addParameter('tag', $tag)
                    ->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function exchangeCalculate(string $senderCurrency, string $receiverCurrency, ?string $senderAmount = null, ?string $receiverAmount): ?Response
    {
        return $this->setMethod('post')
                    ->setPathName(self::EXCHANGE_CALCULATE)
                    ->addParameter('sender_currency', $senderCurrency)
                    ->addParameter('receiver_currency', $receiverCurrency)
                    ->addParameter('sender_amount', $senderAmount)
                    ->addParameter('receiver_amount', $receiverAmount)
                    ->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function exchangeFixed(string $foreignId, string $senderCurrency, string $receiverCurrency, string $senderAmount, string $price): ?Response
    {
        return $this->setMethod('post')
                    ->setPathName(self::EXCHANGE_FIXED)
                    ->addParameter('foreign_id', $foreignId)
                    ->addParameter('sender_currency', $senderCurrency)
                    ->addParameter('receiver_currency', $receiverCurrency)
                    ->addParameter('sender_amount', $senderAmount)
                    ->addParameter('price', $price)
                    ->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function exchangeNow(string $foreignId, string $senderCurrency, string $receiverCurrency, string $senderAmount): ?Response
    {
        return $this->setMethod('post')
                    ->setPathName(self::EXCHANGE_NOW)
                    ->addParameter('foreign_id', $foreignId)
                    ->addParameter('sender_currency', $senderCurrency)
                    ->addParameter('receiver_currency', $receiverCurrency)
                    ->addParameter('sender_amount', $senderAmount)
                    ->request();
    }

    /**
     * Calculate rates for futures
     *
     * Get info about rates for futures
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/api-reference#calculate-rates-for-futures
     *
     * @param string $address
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function futuresRates(string $address): ?Response
    {
        return $this->setMethod('post')->setPathName(self::FUTURES_RATES)->addParameter('address', $address)->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function futuresConfirm(string $address, string $senderCurrency, string $receiverCurrency, string $receiverAmount): ?Response
    {
        return $this->setMethod('post')
                    ->setPathName(self::FUTURES_CONFIRM)
                    ->addParameter('address', $address)
                    ->addParameter('sender_currency', $senderCurrency)
                    ->addParameter('receiver_currency', $receiverCurrency)
                    ->addParameter('receiver_amount', $receiverAmount)
                    ->request();
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
     * @return \KukulkanPopolvux\CoinspaidApiLaravel\Response|null
     */
    public function createInvoices(
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
    ): ?Response {
        return $this->setMethod('post')
                    ->setPathName(self::CREATE_INVOICES)
                    ->addParameter('foreign_id', $foreignId)
                    ->addParameter('currency', $currency)
                    ->addParameter('amount', $amount)
                    ->addParameter('title', $title)
                    ->addParameter('timer', (int) $timer, true)
                    ->addParameter('url_success', $urlSuccess)
                    ->addParameter('url_failed', $urlFailed)
                    ->addParameter('email_user', $emailUser)
                    ->addParameter('sender_currency', $senderCurrency)
                    ->addParameter('description', $description)
                    ->request();
    }
}
