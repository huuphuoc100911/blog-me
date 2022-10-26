<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegisterRequest;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    public function register()
    {
        return view('admin.auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $filters = $request->validated();

        if ($this->adminService->registerAdmin($filters)) {
            return redirect()->route('admin.login')->with('register_success', 'Account successfully created');
        } else {
            return redirect()->back()->with('register_fail', 'Account creation failed');
        }
    }
}
