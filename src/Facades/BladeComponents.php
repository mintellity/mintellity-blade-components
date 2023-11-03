<?php

namespace Mintellity\BladeComponents\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mintellity\BladeComponents\BladeComponents
 */
class BladeComponents extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mintellity\BladeComponents\BladeComponents::class;
    }
}
