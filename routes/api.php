<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/test', function (Request $request) {
    return 'API is working';
});


require_once __DIR__ . "/feed.php";
require_once __DIR__ . "/utils.php";
require_once __DIR__ . "/user.php";
require_once __DIR__ . "/admin.php";
