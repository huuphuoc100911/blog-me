<?php

namespace App\Providers;

use App\Models\InfoCompany;
use App\Services\User\UserService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $infoCompany = InfoCompany::findOrFail(1);

        // View::share([
        //     'infoCompanyShare' => $infoCompany,
        // ]);
    }
}
