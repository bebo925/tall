<?php

namespace Tall;

use Livewire\Livewire;
use Tall\ConfirmationDialog;
use Tall\Commands\TallCommand;
use Tall\Commands\PublishTallStubs;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

    public function bootingPackage(): void
    {
        Livewire::component('tall-confirmation-dialog', ConfirmationDialog::class);
    }
}
