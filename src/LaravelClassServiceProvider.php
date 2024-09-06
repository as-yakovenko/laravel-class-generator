<?php

namespace Yakovenko\LaravelClassGenerator;

use Illuminate\Support\ServiceProvider;
use Yakovenko\LaravelClassGenerator\Commands\GenerateServiceCommand;
use Yakovenko\LaravelClassGenerator\Commands\GenerateUtilityCommand;
use Yakovenko\LaravelClassGenerator\Commands\GenerateHelperCommand;
use Yakovenko\LaravelClassGenerator\Commands\GenerateTraitCommand;

class LaravelClassServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            GenerateServiceCommand::class,
            GenerateUtilityCommand::class,
            GenerateHelperCommand::class,
            GenerateTraitCommand::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
