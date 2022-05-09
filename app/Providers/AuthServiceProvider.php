<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define("yesadmin",function(User $user){
            $group = UserGroup::find($user->user_groupId);
            $allow_tab=["admin","personnel","superadmin"];
            return in_array($group->name,$allow_tab) ;
        });
    }
}
