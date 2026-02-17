<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class RulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // принимает любую модель, главное чтобы у неё был user_id.
        Gate::define('edit-model', function (User $user, Model $model) { 
            return ($user->id === $model->user_id) 
                || $user->isAdmin();
        });
    }
}
