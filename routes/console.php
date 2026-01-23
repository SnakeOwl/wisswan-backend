<?php

use App\Console\Commands\DeleteOldAuthCodes;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


Schedule::command(DeleteOldAuthCodes::class)->daily();