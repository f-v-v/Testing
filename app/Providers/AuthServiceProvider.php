<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Post;

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

        //My
        $this->registerPostPolicies();
    }

    public function registerPostPolicies()
    {
        Gate::define('create-post', function ($user) {
            // echo 'я тут';
            return $user->hasAccess(['create-post']);
        });
        Gate::define('update-post', function ($user, Post $post) {
            // echo 'я тут-'.$post;
            return $user->hasAccess(['update-post']) or $user->id == $post->user_id;
        });
        Gate::define('publish-post', function ($user) {
            return $user->hasAccess(['publish-post']);
        });
        Gate::define('see-all-drafts', function ($user) {
            return $user->inRole('editor');
        });

    }
}
