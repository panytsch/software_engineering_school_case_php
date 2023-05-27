<?php

namespace App\Providers;

use App\Storage\EmailStorage;
use App\Storage\EmailStorageInterface;
use Illuminate\Support\ServiceProvider;

class BindProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(EmailStorageInterface::class, EmailStorage::class);
    }
}
