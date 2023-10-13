<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapStaffRoutes();

        $this->mapVueRoutes();

        $this->mapAdminVueRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->as('admin.')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }

    protected function mapStaffRoutes()
    {
        Route::prefix('staff')
            ->middleware('web')
            ->as('staff.')
            ->namespace($this->namespace . '\Staff')
            ->group(base_path('routes/staff.php'));
    }

    protected function mapVueRoutes()
    {
        Route::prefix('vue')
            ->as('vue.')
            ->namespace($this->namespace . '\Vue')
            ->group(base_path('routes/vue.php'));
    }

    protected function mapAdminVueRoutes()
    {
        Route::prefix('admin-vue')
            ->as('admin-vue.')
            ->namespace($this->namespace . '\AdminVue')
            ->group(base_path('routes/admin-vue.php'));
    }
}
