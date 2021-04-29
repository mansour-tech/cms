<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
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

        Permission::get(['name'])->map(function($permission)
        {
            Gate::define($permission->name , function($user , $post) use ($permission)
            {
                return $user->hasAllow($permission->name) && ($user->id == $post->user_id);
            });
        });

        /*  Gate::define('delete-post' , function($user)
            {
                return $user->hasAllow('delete-post');
            });
            Gate::define('edit-post' , function($user)
            {
                return $user->hasAllow('edit-post');
            });
        */
        /* map دالة نفس فور اتش */

    }
}
