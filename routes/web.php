<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DateTimeController;
use App\Http\Controllers\EstimateController;

/*
Route::get('/', function () {
    return('Done');
    //return view('welcome');
});
*/

// general.test/datetime?date=2024-07-08
Route::get('/datetime', [DateTimeController::class, 'checkDate']);
// general.test/estimate?created=2024-07-05 15:55:11&length=480&workdays=1&start=08:00:00&end=16:00:00
Route::get('/estimate', [EstimateController::class, 'estimate']);