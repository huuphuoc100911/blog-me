<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function guard()
    {
        return Auth::guard();
    }

    public function login()
    {
        return view('user.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard()->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('index');
        } else {
            return redirect()->back()->with('login_fail', 'Incorrect email or password');
        }
    }

    public function forgotPassword()
    {
        return view('user.auth.forgot-password');
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
