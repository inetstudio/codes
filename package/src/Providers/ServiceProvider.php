<?php

namespace InetStudio\CodesPackage\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class RequestsServiceProvider.
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Загрузка сервиса.
     */
    public function boot(): void
    {
        $this->registerConsoleCommands();
    }

    /**
     * Регистрация команд.
     */
    protected function registerConsoleCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands(
            [
                'InetStudio\CodesPackage\Console\Commands\SetupCommand',
            ]
        );
    }
}
