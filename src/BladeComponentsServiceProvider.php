<?php

namespace Mintellity\BladeComponents;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('blade-components')
            ->hasViews('mint');
    }

    public function bootingPackage()
    {
        //        Blade::componentNamespace('Nightshade\\Views\\Components', 'nightshade');
        //        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'bs');
    }
}
