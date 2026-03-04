<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;



Route::middleware(['user_access:admin', 'auth:sanctum'])
    ->prefix('admin')
    ->group(function () {
        Route::apiResource('users', UsersController::class)
            ->except('store', 'update');
    });
