<?php

namespace OxaPay\OxaPay\Providers;

use Illuminate\Support\ServiceProvider;
use OxaPay\OxaPay\OxaPay;

class OxaPayProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // oxapay facade
        $this->app->singleton('oxapay', OxaPay::class);

        // config
        $this->mergeConfigFrom(__DIR__ . '/../../config/oxapay.php', 'oxapay');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // config
        $this->publishes([
            __DIR__.'/../../config/oxapay.php' => config_path('oxapay.php'),
        ], 'oxapay-config');
    }

}
