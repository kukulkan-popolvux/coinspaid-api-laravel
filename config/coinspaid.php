<?php

return [

    /*
    |--------------------------------------------------------------------------------------------------------
    | This file is for storing credentials for service integration https://coinspaid.com/ through their api
    |--------------------------------------------------------------------------------------------------------
    */

    /**
     * The public key, that can be obtained from user's account
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/obtaining-api-keys
     */
    'api_key' => env('COINSPAID_API_KEY'),

    /**
     * In order to activate your API key and see your secret enter 2FA code and click "Activate"
     * After the activation you will see your secret
     *
     * Please note that after closing the "Activate API key" window, you won't be able to see it again
     *
     * @link https://docs.cryptoprocessing.com/api-documentation/obtaining-api-keys
     */
    'key' => env('COINSPAID_SECRET_KEY'),

    /**
     * Program environment, prod or test
     */
    'environment' => env('COINSPAID_ENVIRONMENT', 'prod'),

    /**
     * Url addresses for interaction with api https://coinspaid.com
     * Urls for testing and production use
     */
    'domains' => [
        'prod' => env('COINSPAID_DOMAIN_PROD', 'https://app.cryptoprocessing.com/api/v2'),
        'test' => env('COINSPAID_DOMAIN_TEST', 'https://app.sandbox.cryptoprocessing.com/api/v2'),
    ],
];
