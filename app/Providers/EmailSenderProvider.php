<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\EmailSenderService;

class EmailSenderProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(EmailSenderService::class, function ($app) {
            return new EmailSenderService();
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
