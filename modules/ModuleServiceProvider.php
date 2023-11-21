<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Modules\CStudent\src\Http\Middlewares\DemoMiddleware;

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

        $this->loadRoutesFrom(__DIR__ . "/routes/routes.php");
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

    private function registerConfig($module)
    {
        $configPath = __DIR__ . '/' . $module . '/configs';

        $configFiles = array_map('basename', File::allFiles($configPath));

        foreach ($configFiles as $config) {
            $alias = basename($config, '.php');

            $this->mergeConfigFrom($configPath . '/' . $config, $alias);
        }
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
