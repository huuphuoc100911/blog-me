<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        return view('customer.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $dataLogin = $request->except('_token');

        if (isCustomerActive($dataLogin['email'])) {
            $checkLogin = Auth::guard('customer')->attempt($dataLogin);
            if ($checkLogin) {
                return redirect(RouteServiceProvider::CUSTOMER);
            } else {
                return redirect()->back()->with('login_fail', 'Email hoặc mật khẩu không hợp lệ');
            }
        } else {
            return redirect()->back()->with('login_fail', 'Tài khoản không tồn tại hoặc chưa kích hoạt');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect()->route('customer.login');
    }
}
