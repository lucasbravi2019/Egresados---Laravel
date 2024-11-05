<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SolicitudRegistrationService;

class SolicitudProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SolicitudService::class, function($app) {
            return new SolicitudService();
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
