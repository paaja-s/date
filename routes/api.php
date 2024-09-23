<?php

use App\Http\Controllers\DateTimeController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;

// Backend-1
// REST API, ale PUT, PATCH a DELETE nejdou, neco je blokuje a nejsou podporovany
Route::apiResource('pictures', PictureController::class);

// General 1-1
// general.test/api/datetime?date=2024-07-08
Route::apiResource('datetime', DateTimeController::class)->only('index');

// General 1-2
// general.test/api/estimate?created=2024-07-05 15:55:11&length=480&workdays=1&start=08:00:00&end=16:00:00
Route::apiResource('estimate', EstimateController::class)->only('index');
