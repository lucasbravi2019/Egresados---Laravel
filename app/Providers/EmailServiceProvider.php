<?php

namespace App\Providers;

use App\Services\EmailService;
use App\Services\EmailSenderService;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(EmailService::class, function($app) {
            $emailSenderService = $app->make(EmailSenderService::class);
            return new EmailService($emailSenderService);
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
