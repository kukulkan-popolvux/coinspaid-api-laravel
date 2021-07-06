<?php

namespace KukulkanPopolvux\CoinspaidApiLaravel;

use Illuminate\Support\ServiceProvider;

class CoinspaidApiLaravelProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/coinspaid.php', 'coinspaid');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/coinspaid.php' => config_path('coinspaid.php'),
        ], 'config');
    }
}
