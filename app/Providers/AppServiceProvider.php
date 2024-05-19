<?php

namespace App\Providers;

use App\CurrencyRate\Contracts\CurrencyRateInterface;
use App\CurrencyRate\CurrencyRate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        App::bind(CurrencyRateInterface::class, CurrencyRate::class);
    }
}
