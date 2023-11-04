<?php

namespace App\Providers;

use App\Models\Module;
use App\Models\Staff;
use App\Policies\BlogCategroyPolicy;
use App\Policies\BlogPolicy;
use App\Policies\GroupPolicy;
use App\Policies\MediaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Media::class => Media2Policy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('staff.medias.view', [MediaPolicy::class, 'view']);
        Gate::define('staff.medias.add', [MediaPolicy::class, 'add']);
        Gate::define('staff.medias.edit', [MediaPolicy::class, 'edit']);
        Gate::define('staff.medias.delete', [MediaPolicy::class, 'delete']);

        Gate::define('staff.blogs.view', [BlogPolicy::class, 'view']);
        Gate::define('staff.blogs.add', [BlogPolicy::class, 'add']);
        Gate::define('staff.blogs.edit', [BlogPolicy::class, 'edit']);
        Gate::define('staff.blogs.delete', [BlogPolicy::class, 'delete']);

        Gate::define('staff.blog_categories.view', [BlogCategroyPolicy::class, 'view']);
        Gate::define('staff.blog_categories.add', [BlogCategroyPolicy::class, 'add']);
        Gate::define('staff.blog_categories.edit', [BlogCategroyPolicy::class, 'edit']);
        Gate::define('staff.blog_categories.delete', [BlogCategroyPolicy::class, 'delete']);

        Gate::define('staff.groups.permission', [GroupPolicy::class, 'permission']);
    }
}