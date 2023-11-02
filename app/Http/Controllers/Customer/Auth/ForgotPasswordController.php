<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordCustomerRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function forgotPassword()
    {
        return view('customer.auth.forgot-password');
    }

    public function sendMail(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        if ($customer) {
            $passwordReset = PasswordReset::updateOrCreate([
                'email' => $customer->email,
            ], [
                'token' => Str::random(60),
                'role' => UserRole::CUSTOMER
            ]);

            if ($passwordReset) {
                $customer->notify(new ResetPasswordCustomerRequest($passwordReset->token));
            }

            return redirect()->back()->with('send_message_success', 'Tin nhắn đã được gửi đến email của bạn');
        }

        return redirect()->back()->with('send_message_fail', 'Email không tồn tại');
    }
}
