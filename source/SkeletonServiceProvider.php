<?php

namespace Poing\Skeleton;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;



class SkeletonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // defaultStringLength from Apifrontend
        Schema::defaultStringLength(191);

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Skeleton::class, function () {
            return new Skeleton();
        });

        // Register Factories
        $this->registerEloquentFactoriesFrom(__DIR__.'/Database/factories');


        $this->app->alias(Skeleton::class, 'skeleton-package');
        $this->mergeConfigFrom(__DIR__.'/config.php', 'skeleton');
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }

}