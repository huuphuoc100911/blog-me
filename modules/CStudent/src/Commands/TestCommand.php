<?php

namespace Modules\CStudent\src\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command';
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
     * @return mixed
     */
    public function handle()
    {
        $this->info('test command');
        Log::info(Carbon::now()->format('Y-m-d H:i:s') . ' - testCommand User');
    }
}
