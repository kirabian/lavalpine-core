<?php

namespace Lavalpine\Core;

use Illuminate\Support\ServiceProvider;
use Lavalpine\Core\Console\Commands\InstallCommand;

class LavalpineServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
