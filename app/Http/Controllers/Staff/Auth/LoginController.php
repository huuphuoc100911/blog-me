<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Enums\AccountStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\LoginRequest;
use App\Services\Staff\StaffService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    protected function guard()
    {
        return Auth::guard('staff');
    }

    public function login()
    {
        return view('staff.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('staff')->attempt($credentials)) {
            if ($this->staffService->checkStaffActive($request->email) == AccountStatus::ACTIVE) {
                return redirect()->route('staff.index');
            } else {
                return redirect()->back()->with('login_fail', 'Your account has been locked');
            }
        } else {
            return redirect()->back()->with('login_fail', 'Incorrect email or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('staff')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('staff.login');
    }
}
