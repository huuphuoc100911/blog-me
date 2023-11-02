<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\ResetPasswordRequest;
use App\Models\Customer;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function resetPassword()
    {
        return view('customer.auth.reset-password');
    }

    public function changePassword(ResetPasswordRequest $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->where('role', UserRole::CUSTOMER)->firstOrFail();

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(30)->isPast()) {
            $passwordReset->delete();

            return redirect()->back()->with('token_invalid', 'This password reset token is invalid.');
        }

        $user = Customer::where('email', $passwordReset->email)->firstOrFail();
        $user->update(['password' => bcrypt($request->password)]);
        $passwordReset->delete();

        return redirect()->route('customer.login')->with('change_password_success', 'Password change successfully');
    }
}
