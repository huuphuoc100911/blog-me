<?php

namespace App\Jobs;

use App\Mail\SendMailStaff;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Mail;

class QueueSendEmailStaff implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $staffs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($staffs)
    {
        $this->staffs = $staffs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $staffs = $this->staffs;

        foreach ($staffs as $staff) {
            $dataMail = [
                'name' => $staff->name,
                'email' => $staff->email,
            ];

            Mail::to($staff->email)->send(new SendMailStaff($dataMail));
        }
    }
}
