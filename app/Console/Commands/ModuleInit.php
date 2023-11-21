<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ModuleInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Module CLI';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        if (File::exists(base_path('modules/' . $name))) {
            $this->error('Module already exists!');

            return true;
        } else {
            File::makeDirectory(base_path('modules/' . $name), 0755, true, true);

            //config
            $configFolder = base_path('modules/' . $name . '/configs');

            if (!File::exists($configFolder)) {
                File::makeDirectory($configFolder, 0755, true, true);

                //Tạo file common.php
                $commonFile = base_path('modules/' . $name . '/configs/common.php');

                if (!File::exists($commonFile)) {
                    $commonFileContent = file_get_contents(app_path('Console/Commands/Templates/common.txt'));

                    File::put($commonFile, $commonFileContent);
                }
            }

            //helper
            $helperFolder = base_path('modules/' . $name . '/helpers');

            if (!File::exists($helperFolder)) {
                File::makeDirectory($helperFolder, 0755, true, true);
            }

            //resources
            $resourcesFolder = base_path('modules/' . $name . '/resources');

            if (!File::exists($resourcesFolder)) {
                File::makeDirectory($resourcesFolder, 0755, true, true);

                //language
                $languageFolder = base_path('modules/' . $name . '/resources/lang');

                if (!File::exists($languageFolder)) {
                    File::makeDirectory($languageFolder, 0755, true, true);
                }

                //views
                $viewsFolder = base_path('modules/' . $name . '/resources/views');

                if (!File::exists($viewsFolder)) {
                    File::makeDirectory($viewsFolder, 0755, true, true);
                }
            }

            //routes
            // $routesFolder = base_path('modules/' . $name . '/routes');

            // if (!File::exists($routesFolder)) {
            //     File::makeDirectory($routesFolder, 0755, true, true);

            //     //Tạo file routes.php
            //     $routesFile = base_path('modules/' . $name . '/routes/routes.php');

            //     if (!File::exists($routesFile)) {
            //         File::put($routesFile, "<?php \n use Illuminate\Support\Facades\Route;");
            //     }
            // }

            //src
            $srcFolder = base_path('modules/' . $name . '/src');

            if (!File::exists($srcFolder)) {
                File::makeDirectory($srcFolder, 0755, true, true);

                //commands
                $commandsFolder = base_path('modules/' . $name . '/src/Commands');

                if (!File::exists($commandsFolder)) {
                    File::makeDirectory($commandsFolder, 0755, true, true);
                }

                //http
                $httpFolder = base_path('modules/' . $name . '/src/Http');

                if (!File::exists($httpFolder)) {
                    File::makeDirectory($httpFolder, 0755, true, true);
                }

                //repositories
                $repositoriesFolder = base_path('modules/' . $name . '/src/Repositories');

                if (!File::exists($repositoriesFolder)) {
                    File::makeDirectory($repositoriesFolder, 0755, true, true);

                    //Tạo file moduleRepository.php
                    $moduleRepositoryFile = base_path('modules/' . $name . '/src/Repositories/' . $name . 'Repository.php');

                    if (!File::exists($moduleRepositoryFile)) {
                        $moduleRepositoryFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleRepository.txt'));
                        $moduleRepositoryFileContent = str_replace('{module}', $name, $moduleRepositoryFileContent);

                        File::put($moduleRepositoryFile, $moduleRepositoryFileContent);
                    }

                    //Tạo file moduleRepositoryInterface.php
                    $moduleRepositoryInterfaceFile = base_path('modules/' . $name . '/src/Repositories/' . $name . 'RepositoryInterface.php');

                    if (!File::exists($moduleRepositoryInterfaceFile)) {
                        $moduleRepositoryInterfaceFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleRepositoryInterface.txt'));
                        $moduleRepositoryInterfaceFileContent = str_replace('{module}', $name, $moduleRepositoryInterfaceFileContent);

                        File::put($moduleRepositoryInterfaceFile, $moduleRepositoryInterfaceFileContent);
                    }
                }
            }

            $this->info('Module created successfully');
        }
    }
}
