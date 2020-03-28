<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 管理者のみ
        Gate::define('admin-only', function($user) {
            return ($user->is_admin == 1);
        });

        // ログインユーザーのみ
        Gate::define('user-only', function($user) {
            return ($user->is_admin > 0 || $user->is_admin <= 10);
        });
    }
}
