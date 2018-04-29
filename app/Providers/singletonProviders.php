<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\fich_voeux;
class singletonProviders extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(fich_voeux::class, function () {
            return new fich_voeux();
        });
    }
}
