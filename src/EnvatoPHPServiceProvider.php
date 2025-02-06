<?php

namespace AticMatic\EnvatoPHP;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EnvatoPHPServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/envato-php.php', 'envato-php');

        $this->app->singleton('envato-php', function ($app) {
            $personalToken = Config::get('envato-php.personal_token');
            return new EnvatoPHP($personalToken);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/envato-php.php' => config_path('envato-php.php'),
        ], 'envato-php-config');
    }
}
