<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Request extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-request {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new request';

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
                $requestFolder = base_path('modules/' . $module . '/src/Http/Requests');

                if (!File::exists($requestFolder)) {
                    File::makeDirectory($requestFolder, 0755, true, true);
                }

                if (File::exists($requestFolder)) {
                    $requestFile = app_path('Console/Commands/Templates/Request.txt');
                    $requestContent = File::get($requestFile);
                    $requestContent = str_replace('{module}', $module, $requestContent);
                    $requestContent = str_replace('{name}', $name, $requestContent);

                    if (!File::exists($requestFolder . '/' . $name . '.php')) {
                        File::put($requestFolder . '/' . $name . '.php', $requestContent);

                        return $this->info('Request created successfully');
                    } else {
                        return $this->error('Request already exists!');
                    }
                } else {
                    return $this->error('Request not exists!');
                }
            } else {
                return $this->error('Http not exists!');
            }
        } else {
            return $this->error('Src not exists!');
        }
    }
}
