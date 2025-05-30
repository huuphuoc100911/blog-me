<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Controller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-controller {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controller Module';

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
        $module = $this->argument('module');

        if (!File::exists(base_path('modules/' . $module))) {
            return $this->error('Module not exists!');
        }

        $srcFolder = base_path('modules/' . $module . '/src');

        if (File::exists($srcFolder)) {
            $httpFolder = base_path('modules/' . $module . '/src/Http');

            if (File::exists($httpFolder)) {
                $controllerFolder = base_path('modules/' . $module . '/src/Http/Controllers');

                if (!File::exists($controllerFolder)) {
                    File::makeDirectory($controllerFolder, 0755, true, true);
                }

                if (File::exists($controllerFolder)) {
                    $controllerFile = app_path('Console/Commands/Templates/Controller.txt');
                    $controllerContent = File::get($controllerFile);
                    $controllerContent = str_replace('{module}', $module, $controllerContent);
                    $controllerContent = str_replace('{name}', $name, $controllerContent);

                    if (!File::exists($controllerFolder . '/' . $name . '.php')) {
                        File::put($controllerFolder . '/' . $name . '.php', $controllerContent);

                        return $this->info('Controller created successfully');
                    } else {
                        return $this->error('Controller already exists!');
                    }
                } else {
                    return $this->error('Controller not exists!');
                }
            } else {
                return $this->error('Http not exists!');
            }
        } else {
            return $this->error('Src not exists!');
        }
    }
}
