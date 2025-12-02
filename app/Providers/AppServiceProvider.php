<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::bootstrap-4');

        // Используем импортированный Gate (единообразно)
        Gate::define('destroy-trip', function (User $user) {
            return $user->id == 1;
        });

        Gate::define('create-transport', function (User $user) {
            return true;
        });
    }
}
