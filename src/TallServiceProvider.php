<?php

namespace Tall;

use Tall\Commands\TallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tall\Commands\PublishTallStubs;

class TallServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('tall')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommands([TallCommand::class, PublishTallStubs::class]);

        \Illuminate\Support\Facades\Blade::anonymousComponentNamespace('components', 'tall');
    }
}
