<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\Staff;
use App\Models\User;
use App\Policies\Media2Policy;
use App\Policies\MediaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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

        Gate::define('medias.add', [MediaPolicy::class, 'add']);
        Gate::define('medias.edit', [MediaPolicy::class, 'edit']);
        Gate::define('medias.delete', [MediaPolicy::class, 'delete']);
    }
}
