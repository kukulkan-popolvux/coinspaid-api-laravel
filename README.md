# coinspaid-api-laravel

The package provides a convenient interface for interacting with the api for the service [CoinsPaid](https://coinspaid.com/)

## Installation

### composer

Use the package manager [composer](https://getcomposer.org/) to install coinspaid-api-laravel

```shell
composer require kukulkan-popolvux/coinspaid-api-laravel
```

---

### provider

Add the ServiceProvider to the providers array in `config/app.php`

```php
KukulkanPopolvux\CoinspaidApiLaravel\CoinspaidApiLaravelProvider::class,
```

---

### .env

To configure the connection to the [CoinsPaid](https://coinspaid.com/) service, and specify the development environment, you must use the following constants in the `.env` file

```
COINSPAID_API_KEY=
COINSPAID_SECRET_KEY=
COINSPAID_ENVIRONMENT=
```

#### Getting API key and secret key

> To obtain `COINSPAID_API_KEY` and `COINSPAID_SECRET_KEY`, you must perform the following steps, which are described in the
> [documentation](https://docs.cryptoprocessing.com/api-documentation/obtaining-api-keys)

---

#### Development environment

> By default, the development environment is listed as production. You can select two values `test` and `prod`  
> Example: `COINSPAID_ENVIRONMENT=test`

---

Constants `COINSPAID_DOMAIN_PROD` and `COINSPAID_DOMAIN_TEST`

> If desired, you can override the values of the domain names of the api of the conispide service using these constants, but this is not recommended.  
> Unless the api domain names change in the server itself, and this library does not have time to make changes.  
> Example: `COINSPAID_DOMAIN_PROD=https://app.cryptoprocessing.com/api/v2`  
> Example: `COINSPAID_DOMAIN_TEST=https://app.sandbox.cryptoprocessing.com/api/v2`  
> [documentation](https://docs.cryptoprocessing.com/api-documentation/api-reference#general-information)

---

### config

If you need a config file, you can use the following command.  
The file will appear in the directory config with name coinspaid.php.  
`config/coinspaid.php`

```shell
php artisan vendor:publish --provider="KukulkanPopolvux\CoinspaidApiLaravel\CoinspaidApiLaravelProvider"
```

---

## Usage

You can use the library immediately after configuration without specifying any additional values.

#### Example:

```php
\KukulkanPopolvux\CoinspaidApiLaravel\Coinspaid::ping()->getBody();
```

or

```php
\KukulkanPopolvux\CoinspaidApiLaravel\Coinspaid::run()->getBody();
```

> The Response object is returned. Calling the `getBody()` method will return the response body  
> The answer should return `OK`, it works without a secret key and an api key.  
> This is just a test of the library connection and its interaction with the [CoinsPaid](https://coinspaid.com/) service.  
> [documentation](https://docs.cryptoprocessing.com/api-documentation/api-reference#ping)

---

#### Example:

```php
\KukulkanPopolvux\CoinspaidApiLaravel\Coinspaid::getListCurrencies()->getBodyObject();
```

or

```php
\KukulkanPopolvux\CoinspaidApiLaravel\Coinspaid::getListCurrencies()->getBody(true);
```

> `getBodyObject()` will return the response body converted to object or you can use `getBody(true)` method with parameter `true`  
> This example shows a method in which the values of the secret key and api key will already be required.  
> Get a list of all supported currencies.  
> [documentation](https://docs.cryptoprocessing.com/api-documentation/api-reference#get-list-of-supported-currencies)

---

#### Example:

```php
\KukulkanPopolvux\CoinspaidApiLaravel\Coinspaid::getListCurrencies()->getData();
```

> Returns the `data` value from the request response.  
> You can pass a parameter to a method `getData('currency')` that will return a value by the key that you passed as a parameter

---

## License

[MIT](https://choosealicense.com/licenses/mit/)
