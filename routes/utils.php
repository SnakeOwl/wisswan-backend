<?php

use App\Http\Controllers\User\Hacks\HacksController;
use Illuminate\Support\Facades\Route;

Route::post('/hacks/rating-inc/{hack}', [HacksController::class, 'increment_rating']);
Route::post('/hacks/anonym-form-suggestion', [HacksController::class, 'anonym_form_suggestion']);
Route::post('/hacks/anonym-form-suggestion-sync-domains/{hack}', [HacksController::class, 'sync_domains_anonymous_hack']);