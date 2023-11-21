<?php

namespace Modules\Auth\src\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\src\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function guard()
    {
        return Auth::guard('manager');
    }

    public function login()
    {
        return view('Auth::manager.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('manager')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('manager.dashboard');
        } else {
            return redirect()->back()->with('login_fail', __('messages.login.failure'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('manager')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('manager.login');
    }
}
