<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\RegisterRequest;
use App\Services\Staff\RegisterService;
use Illuminate\Http\Request;

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
            return redirect()->route('staff.login')->with('register_success', 'Account registration successful');
        }

        return redirect()->back()->with('register_fail', 'Account registration failed');
    }
}
