<?php

namespace App\Http\Controllers\User\Auth;

use App\Enums\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResetPasswordRequest as AdminResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\ResetPasswordUserRequest;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function resetPassword()
    {
        return view('user.auth.reset-password');
    }

    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $passwordReset = PasswordReset::updateOrCreate([
                'email' => $user->email,
            ], [
                'token' => Str::random(60),
                'role' => UserRole::USER
            ]);

            if ($passwordReset) {
                $user->notify(new ResetPasswordUserRequest($passwordReset->token));
            }

            return redirect()->back()->with('send_message_success', 'The message was sent to your email');
        }

        return redirect()->back()->with('send_message_fail', 'Email does not exist');
    }

    public function changePassword(AdminResetPasswordRequest $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->firstOrFail();

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(30)->isPast()) {
            $passwordReset->delete();

            return redirect()->back()->with('token_invalid', 'This password reset token is invalid.');
        }

        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $user->update([
            'password' => bcrypt($request->password),
            'password_socialite' => $request->password
        ]);

        $passwordReset->delete();

        return redirect()->route('login')->with('change_password_success', 'Password change successfully');
    }
}
