<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Seeding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:db-seed {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a seeding module';

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
        $namespace = "Modules\\{$module}\\Seeders\\{$name}";

        $this->call('db:seed', [
            'class' => $namespace,
        ]);
    }
}
