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
    public const HOME = '/';
    public const ADMIN = '/admin/dashboard';
    public const STAFF = '/staff/dashboard';
    public const CUSTOMER = '/customer';
    public const MANAGER = '/manager';

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

        $this->mapManagerRoutes();

        $this->mapStaffRoutes();

        $this->mapCustomerRoutes();

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

    protected function mapManagerRoutes()
    {
        Route::prefix('manager')
            ->as('manager.')
            ->middleware('web')
            ->namespace('Modules\Auth\src\Http\Controllers\Manager')
            ->group(base_path('Modules/Auth/routes/routes.php'));
    }

    protected function mapStaffRoutes()
    {
        Route::prefix('staff')
            ->middleware('web')
            ->as('staff.')
            ->namespace($this->namespace . '\Staff')
            ->group(base_path('routes/staff.php'));
    }

    protected function mapCustomerRoutes()
    {
        Route::prefix('customer')
            ->middleware('web')
            ->as('customer.')
            ->namespace($this->namespace . '\Customer')
            ->group(base_path('routes/customer.php'));
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
