<?php

use App\Http\Controllers\User\Hacks\HacksController;
use App\Http\Controllers\User\Login\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login-email', [LoginController::class, 'login']);
Route::post('/login-code', [LoginController::class, 'check_code']);


Route::middleware('auth:sanctum')
    ->prefix('user')
    ->group(function () {
        Route::get('/', function (Request $request) {
            return $request->user();
        });

        Route::apiResource('hacks', HacksController::class)->except(['update']);
        Route::post('hacks/{hack}', [HacksController::class, 'update']);
    });
