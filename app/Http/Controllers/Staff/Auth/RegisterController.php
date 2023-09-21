<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\RegisterRequest;
use App\Models\Admin;
use App\Notifications\RegisterStaffRequest;
use App\Services\Staff\RegisterService;

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
        $filters = $requets->validated();

        if ($this->registerService->registerStaff($filters)) {
            $admin = Admin::whereId(1)->first();

            if ($admin) {
                $admin->notify(new RegisterStaffRequest($filters['email']));
            }

            return redirect()->route('staff.login')->with('register_success', 'Account registration successful');
        }

        return redirect()->back()->with('register_fail', 'Account registration failed');
    }
}
