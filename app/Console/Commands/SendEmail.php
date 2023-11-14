<?php

namespace App\Console\Commands;

use App\Core\DemoSend;
use Illuminate\Console\Command;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {email=abc@gmail.com} {--queue=huuphuoc}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public $email;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DemoSend $email)
    {
        parent::__construct();

        $this->email = $email;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Vui lòng nhập tên: ');
        var_dump($name);

        $age = $this->choice('Vui lòng chọn lứa tuổi: ', ['Nhỏ hơn 18', 'Lớn hơn 18']);
        var_dump($age);

        $this->error('Tên của bạn là: ' . $name);

        echo $this->argument('email');
        echo $this->option('queue');

        echo $this->email->send();
    }
}
