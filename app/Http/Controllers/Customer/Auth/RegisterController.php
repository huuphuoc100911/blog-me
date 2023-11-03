<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\RegisterRequest;
use App\Services\Customer\RegisterService;

class RegisterController extends Controller
{
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register()
    {
        return view('customer.auth.register');
    }

    public function postRegister(RegisterRequest $requets)
    {
        $filters = $requets->validated();

        if ($this->registerService->registerCustomer($filters)) {

            return redirect()->route('customer.login')->with('register_success', 'Account registration successful');
        }

        return redirect()->back()->with('register_fail', 'Account registration failed');
    }
}
