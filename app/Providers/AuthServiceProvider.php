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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin','author','seller','seller2','user']);
        });
        Gate::define('admin-users',function($user){
            return $user->hasRole('admin');
        });
        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['author','admin']);
        });
        Gate::define('seller-users', function($user){
            return $user->hasAnyRoles(['seller','seller2','admin']);
        });
        Gate::define('seller2-users', function($user){
            return $user->hasRole(['seller2']);
        });
        Gate::define('user-users', function($user){
            return $user->hasRole('user');
        });
    }
}
