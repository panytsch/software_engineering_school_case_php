<?php

use App\Console\Commands\SendRatesCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(SendRatesCommand::class)
    ->dailyAt(env('CURRENCY_RATE_REPORT_TIME'))
    ->timezone('Europe/Kyiv');
