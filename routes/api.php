<?php

use App\Http\Controllers\RateController;
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

Route::get('/test', function () {
    return \Illuminate\Support\Facades\Response::json(['status' => 'ok']);
});

Route::get('/rate', RateController::class);
