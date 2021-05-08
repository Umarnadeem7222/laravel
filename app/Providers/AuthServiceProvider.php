<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('teacher-in',function ($user){
           if($user->Role == 'Teacher'){
            return true;
        }
        return false;
        }); 
        Gate::define('student-in',function ($user){
           if($user->Role == 'Student'){
            return true;
        }
        return false;
        }); 
    }
}
