<?php

namespace App\Http\Controllers\Staff\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\Staff;
use App\Notifications\ResetPasswordStaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('staff.auth.forgot-password');
    }

    public function sendMail(Request $request)
    {
        $staff = Staff::where('email', $request->email)->first();

        if ($staff) {
            $passwordReset = PasswordReset::updateOrCreate([
                'email' => $staff->email,
            ], [
                'token' => Str::random(60),
                'role' => UserRole::STAFF
            ]);

            if ($passwordReset) {
                $staff->notify(new ResetPasswordStaffRequest($passwordReset->token));
            }

            return redirect()->back()->with('send_message_success', 'The message was sent to your email');
        }

        return redirect()->back()->with('send_message_fail', 'Email does not exist');
    }
}
