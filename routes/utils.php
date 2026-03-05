<?php

use App\Http\Controllers\User\Hacks\HacksController;
use Illuminate\Support\Facades\Route;

Route::post('/hacks/rating-inc/{hack}', [HacksController::class, 'increment_rating']);
Route::post('/hacks/anonym-form-suggestion', [HacksController::class, 'anonym_form_suggestion']);