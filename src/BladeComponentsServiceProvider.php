<?php

namespace Mintellity\BladeComponents;

use Mintellity\BladeComponents\Providers\BladeServiceProvider;
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

    public function registeringPackage(): void
    {
        parent::registeringPackage();

        $this->app->register(BladeServiceProvider::class);
    }
}
