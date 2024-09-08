<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/current', [WeatherController::class, 'current']);
Route::get('/current/forecast/{country}', [WeatherController::class, 'forecast']);
