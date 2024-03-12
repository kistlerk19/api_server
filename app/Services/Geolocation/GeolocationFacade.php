<?php

namespace App\Services\Geolocation;

use Illuminate\Support\Facades\Facade;

/**
 * @method static search(string $string)
 */
class GeolocationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Geolocation::class;
    }
}
