<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        // 'App\Models\Comment' => 'App\Policies\CommentPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('login-dashboard', function($user) {
            return $user->isAdmin();
        });

        Gate::define('update-posts', function($user) {
            return $user->isAdmin();
        });

        Gate::define('update-pages', function($user) {
            return $user->isAdmin();
        });
        Gate::define('update-categories', function($user) {
            return $user->isAdmin();
        });

        Gate::define('update-users', function($user) {
            return $user->isSuperAdmin();
        });
    }
}
