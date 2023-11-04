<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SendPassword;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginSocialiteController extends Controller
{
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback(Request $request)
    {
        try {
            $user = Socialite::driver('twitter')->user();

            $userExist = User::where('email', $user->email)->first();

            if ($userExist) {
                $randomString = Str::random(8);

                $userExist->update([
                    'twitter_id' => $user->id,
                    'password' => bcrypt($randomString)
                ]);

                $dataMail = [
                    'name' => $userExist->name,
                    'email' => $userExist->email,
                    'password' => $randomString
                ];

                Mail::to($userExist->email)->send(new SendPassword($dataMail));

                $credentials = [
                    'email' => $userExist->email,
                    'password' => $randomString,
                ];

                if (Auth::guard()->attempt($credentials)) {
                    $request->session()->regenerate();

                    return redirect()->intended('/');
                }

                return redirect()->route('login')->with('login_fail', 'Đăng nhập bằng email thất bại');
            } else {
                $randomString = Str::random(8);

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id' => $user->id,
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