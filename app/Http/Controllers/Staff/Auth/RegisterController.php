<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\RegisterRequest;
use App\Jobs\SendNotifyRegisterStaffForAdmin;
use App\Jobs\SendWelcomeStaff;
use App\Models\Admin;
use App\Notifications\RegisterStaffRequest;
use App\Services\Staff\RegisterService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register()
    {
        return view('staff.auth.register');
    }

    public function postRegister(RegisterRequest $requets)
    {
        try {
            $filters = $requets->validated();

            if ($this->registerService->registerStaff($filters)) {
                $admin = Admin::whereId(1)->first();

                if ($admin) {
                    $sendNotifyAdminJob = (new SendNotifyRegisterStaffForAdmin($admin, $filters['email']))->delay(Carbon::now()->addSeconds(10));
                    dispatch($sendNotifyAdminJob);
                }

                $job = (new SendWelcomeStaff($filters['email'], $filters['name']))->delay(Carbon::now()->addSeconds(15));
                dispatch($job);

                return redirect()->route('staff.login')->with('register_success', 'Account registration successful');
            }

            return redirect()->back()->with('register_fail', 'Account registration failed');
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}
