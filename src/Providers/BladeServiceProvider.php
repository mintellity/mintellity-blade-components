<?php

namespace Mintellity\BladeComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class BladeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /**
         * Macro for component attributes to map over them.
         */
        ComponentAttributeBag::macro('mapWithKeys', function (callable $callback) {
            return new static(collect($this->attributes)->mapWithKeys($callback)->toArray());
        });

        /**
         * Macro for component attributes to filter and map by prefix.
         *
         * <x-mint::form.input group:class="bg-red-500" />
         *
         * <div {{ $attributes->prefix('group') }}> ... </div>
         * results in
         * <div class="bg-red-500"> ... </div>
         */
        ComponentAttributeBag::macro('prefixed', function (string|iterable $prefix) {
            $prefixes = collect($prefix)->map(fn($prefix) => Str::finish($prefix, ':'));

            return $this->whereStartsWith($prefixes)->mapWithKeys(function ($value, $key) use ($prefixes) {
                $prefix = $prefixes->first(fn($prefix) => Str::startsWith($key, $prefix));

                return [Str::after($key, $prefix) => $value];
            });
        });

        /**
         * Macro for component attributes to filter by prefix.
         */
        ComponentAttributeBag::macro('notPrefixed', function (string|iterable $prefix) {
            $prefixes = collect($prefix)->map(fn($prefix) => Str::finish($prefix, ':'));

            return $this->whereDoesntStartWith($prefixes);
        });
    }
}
