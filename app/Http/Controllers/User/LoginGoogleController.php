<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SendPassword;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Mail;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();

            $userExist = User::where('email', $user->email)->first();

            if ($userExist) {
                $dataMail = [
                    'name' => $userExist->name,
                    'email' => $userExist->email,
                ];

                Mail::to($userExist->email)->send(new SendPassword($dataMail));

                if (Auth::loginUsingId($userExist->id)) {
                    return redirect()->intended('/');
                }

                return redirect()->route('login')->with('login_fail', 'Đăng nhập bằng email thất bại');
            } else {
                $randomString = Str::random(8);

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt($randomString),
                ]);

                $credentials = [
                    'email' => $newUser->email,
                    'password' => $randomString
                ];

                $dataMail = [
                    'name' => $newUser->name,
                    'email' => $newUser->email,
                    'password' => $randomString
                ];

                Mail::to($newUser->email)->send(new SendPassword($dataMail));

                if (Auth::guard()->attempt($credentials)) {
                    $request->session()->regenerate();

                    return redirect()->intended('/');
                }
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}