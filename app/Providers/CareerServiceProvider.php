<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CareerService;

class CareerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CareerService::class, function($app) {
            return new CareerService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
