<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Seeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-seeder {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new seeder';

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

        $seedersFolder = base_path('modules/' . $module . '/seeders');

        if (!File::exists($seedersFolder)) {
            File::makeDirectory($seedersFolder, 0755, true, true);
        }

        if (File::exists($seedersFolder)) {
            $seederFile = app_path('Console/Commands/Templates/Seeders.txt');
            $seederContent = File::get($seederFile);
            $seederContent = str_replace('{module}', $module, $seederContent);
            $seederContent = str_replace('{name}', $name, $seederContent);

            if (!File::exists($seedersFolder . '/' . $name . '.php')) {
                File::put($seedersFolder . '/' . $name . '.php', $seederContent);

                return $this->info('Seeder created successfully');
            } else {
                return $this->error('Seeder already exists!');
            }
        }
    }
}
