<?php

use App\Http\Controllers\Feed\GetDomainsController;
use App\Http\Controllers\Feed\GetHacksController;
use App\Http\Controllers\Feed\GetHacksDomainsController;
use App\Http\Controllers\Feed\GetIndexHacksController;
use Illuminate\Support\Facades\Route;

Route::prefix('feed')
    ->group(function () {
        Route::get('index-hacks', GetIndexHacksController::class);
        Route::get('hacks', GetHacksController::class);
        Route::get('domains', GetDomainsController::class);
        Route::get('hacks-domains', GetHacksDomainsController::class);

    });