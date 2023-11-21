<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Migration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-migration {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration';

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

        $migrationsFolder = base_path('modules/' . $module . '/migrations');

        if (!File::exists($migrationsFolder)) {
            File::makeDirectory($migrationsFolder, 0755, true, true);
        }

        if (File::exists($migrationsFolder)) {
            $migrationFile = app_path('Console/Commands/Templates/Migrations.txt');
            $migrationContent = File::get($migrationFile);
            $migrationContent = str_replace('{table}', strtolower($module), $migrationContent);
            $migrationContent = str_replace('{name}', Str::studly($name), $migrationContent);

            $name = Carbon::now()->format('Y_m_d_His') . '_' . $name;

            if (!File::exists($migrationsFolder . '/' . $name . '.php')) {
                File::put($migrationsFolder . '/' . $name . '.php', $migrationContent);

                return $this->info('Migration created successfully');
            }
        }
    }
}
