<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function register()
    {
        return view('user.auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $filters = $request->validated();

        if ($this->userService->registerUser($filters)) {
            return redirect()->route('login')->with('register_success', 'Account successfully created');
        } else {
            return redirect()->back()->with('register_fail', 'Account creation failed');
        }
    }
}
