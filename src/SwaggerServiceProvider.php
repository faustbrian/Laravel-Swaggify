<?php

namespace BrianFaust\Swagger;

use BrianFaust\ServiceProvider\ServiceProvider;

class SwaggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishViews();
        $this->publishAssets();

        $this->loadViews();
        $this->loadRoutes();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->mergeConfig();

        $this->commands(Console\GenerateDocsCommand::class);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    protected function getPackageName()
    {
        return 'laravel-swagger';
    }
}