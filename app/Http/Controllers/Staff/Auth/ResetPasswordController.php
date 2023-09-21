<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\ResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function resetPassword()
    {
        return view('staff.auth.reset-password');
    }

    public function changePassword(ResetPasswordRequest $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->firstOrFail();

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(30)->isPast()) {
            $passwordReset->delete();

            return redirect()->back()->with('token_invalid', 'This password reset token is invalid.');
        }

        $user = Staff::where('email', $passwordReset->email)->firstOrFail();
        $user->update(['password' => bcrypt($request->password)]);
        $passwordReset->delete();

        return redirect()->route('staff.login')->with('change_password_success', 'Password change successfully');
    }
}
