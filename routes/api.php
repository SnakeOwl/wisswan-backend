<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/test', function (Request $request) {
    return 'API is working';
});


require_once __DIR__ . "/user.php";