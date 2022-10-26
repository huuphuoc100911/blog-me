<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('staff.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        
        if (Auth::guard('staff')->attempt($credentials)) {
            return redirect()->route('staff.reset-password');
        } else {
            return redirect()->back()->with('login_fail', 'Incorrect email or password');
        }
    }
}
