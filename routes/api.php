<?php

use App\Http\Controllers\RateController;
use App\Http\Controllers\SendEmailsController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/rate', RateController::class);
Route::post('/subscribe', SubscribeController::class);
Route::post('/sendEmails', SendEmailsController::class);
