<?php

namespace AticMatic\EnvatoPHP\Facades;

use Illuminate\Support\Facades\Facade;

class EnvatoPHP extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'envato-php'; // This should match the key you used in the service provider
    }
}