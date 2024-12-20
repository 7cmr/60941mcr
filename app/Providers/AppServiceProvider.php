<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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

        \Illuminate\Support\Facades\Gate::define('destroy-trip', function (User $user) {
            return $user->id == 1;
        });

    }
}
