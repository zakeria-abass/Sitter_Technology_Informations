<?php

namespace App\Providers;

use App\Models\Roles\Ability;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        foreach (Ability::get() as $ability){
            Gate::define($ability->code,function ($user) use ($ability){
                return $user->role->abilites()->where('code',$ability->code)->exists();
            });

        }

    }
}
