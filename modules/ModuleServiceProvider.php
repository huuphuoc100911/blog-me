<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\CCategory\src\Repositories\CCategoryRepository;
use Modules\CCategory\src\Repositories\CCategoryRepositoryInterface;
use Modules\CManager\src\Repositories\CManagerRepository;
use Modules\CManager\src\Repositories\CManagerRepositoryInterface;
use Modules\Course\src\Repositories\CourseRepository;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\CStudent\src\Http\Middlewares\DemoMiddleware;
use Modules\Teacher\src\Repositories\TeacherRepository;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class ModuleServiceProvider extends ServiceProvider
{
    private $middlewares = [
        'demo' => DemoMiddleware::class
    ];

    private $commands = [];

    public function boot()
    {
        $modules = $this->getModule();

        if (!empty($modules)) {
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }
    }

    public function register()
    {
        $modules = $this->getModule();

        if (!empty($modules)) {
            //Config
            foreach ($modules as $module) {
                if ($module != 'routes') {
                    $this->registerConfig($module);
                }
            }

            //Middleware
            $this->registerMiddlewares();

            //Command
            $this->commands($this->commands);
        }

        $this->bindingRepositories();

        // $this->loadRoutesFrom(__DIR__ . "/routes/manager.php");
        $this->registerRoutes();
    }

    private function getModule()
    {
        return array_map('basename', File::directories(__DIR__));
    }

    private function registerModule($module)
    {
        $modulePath = __DIR__ . "/$module";

        // Khai báo routes
        // if (File::exists($modulePath . '/routes/routes.php')) {
        //     $this->loadRoutesFrom($modulePath . "/routes/routes.php");
        // }

        //Khai báo migrations
        if (File::exists($modulePath . '/migrations')) {
            $this->loadMigrationsFrom($modulePath . "/migrations");
        }

        //Khai báo languages
        if (File::exists($modulePath . '/resources/lang')) {
            $this->loadTranslationsFrom($modulePath . "/resources/lang", $module);
            $this->loadJSONTranslationsFrom($modulePath . '/resources/lang');
        }

        //Khai báo views
        if (File::exists($modulePath . '/resources/views')) {
            $this->loadViewsFrom($modulePath . "/resources/views", $module);
        }

        // Khai báo helpers
        if (File::exists($modulePath . "/helpers")) {
            $helperList = File::allFiles($modulePath . "/helpers");

            foreach ($helperList as $helper) {
                require $helper->getPathName();
            }
        }
    }

    private function bindingRepositories()
    {
        //User manager repositories
        $this->app->singleton(
            CManagerRepositoryInterface::class,
            CManagerRepository::class
        );

        //Categories repositories
        $this->app->singleton(
            CCategoryRepositoryInterface::class,
            CCategoryRepository::class
        );

        //Course repositories
        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );

        //Teacher repositories
        $this->app->singleton(
            TeacherRepositoryInterface::class,
            TeacherRepository::class
        );
    }

    private function registerConfig($module)
    {
        $configPath = __DIR__ . '/' . $module . '/configs';

        $configFiles = array_map('basename', File::allFiles($configPath));

        foreach ($configFiles as $config) {
            $alias = basename($config, '.php');

            $this->mergeConfigFrom($configPath . '/' . $config, $alias);
        }
    }

    private function registerRoutes()
    {
        Route::middleware('web')->group(function () {
            $routePath = __DIR__ . '/routes';

            $routeFiles = array_map('basename', File::allFiles($routePath));

            foreach ($routeFiles as $route) {
                $this->loadRoutesFrom($routePath . '/' . $route);
            }
        });
    }

    private function registerMiddlewares()
    {
        if (!empty($this->middlewares)) {
            foreach ($this->middlewares as $key => $middleware) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }
}
