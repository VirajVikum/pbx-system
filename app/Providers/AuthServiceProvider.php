<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        Gate::define('is-super-admin', fn (User $user) =>
            $user->user_type_id === 1
        );

        Gate::define('is-admin', fn (User $user) =>
            in_array($user->user_type_id, [1, 2])
        );

        Gate::define('is-agent', fn (User $user) =>
            in_array($user->user_type_id, [3, 4])
        );
    }
}
