<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use App\User;

class AuthUserProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('*', function($view){
            $auth_user = auth()->user();
            $view->with('auth_user', $auth_user);
        });
        
        Blade::if('adminuser', function(){
            return true;
        });
    }
}
