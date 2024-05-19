<?php

use App\Http\Controllers\CurrencyRateController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/rate', [CurrencyRateController::class, 'rate']);

Route::post('/subscribe', [SubscribeController::class, 'subscribe']);
