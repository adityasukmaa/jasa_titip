<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('auth', function(){
            if(Auth::check()){
                return true;
            }
        });
        Gate::define('kurir', function(?User $user){
            if(session()->has('kurir')){
                return true;
            }
        });
        Gate::define('toko', function(?User $user){
            if(session()->has('toko')){
                return true;
            }
        });
        Gate::define('superadmin', function(User $user){
            if($user->role == 'superadmin'){
                return true;
            }
        });
        Gate::define('admin', function(User $user){
            if($user->role == 'admin'){
                return true;
            }
        });
    }
}
