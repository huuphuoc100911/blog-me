<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $checkLogin = Auth::guard('customer')->attempt(['email' => $email, 'password' => $password]);

        if ($checkLogin) {
            $customer = Auth::guard('customer')->user();

            $token = $customer->createToken('auth-token')->plainTextToken;

            return [
                'status' => Response::HTTP_OK,
                'token' => $token

            ];
        } else {
            return [
                'status' => Response::HTTP_UNAUTHORIZED,
                'title' => 'Unauthorized'
            ];
        }
    }

    public function getToken(Request $request)
    {
        return $request->user();
    }

    public function refreshToken(Request $request)
    {
        if ($request->header('Authorization')) {
            $hashToken = $request->header('Authorization');
            $hashToken = str_replace('Bearer', '', $hashToken);
            $hashToken = trim($hashToken);
            $token = PersonalAccessToken::findToken($hashToken);

            if ($token) {
                $tokenCreated = $token->created_at;
                $expired = Carbon::parse($tokenCreated)->addMinutes(config('sanctum.expiration'));

                if (Carbon::now() >= $expired) {
                    $customerId = $token->tokenable_id;
                    $customer = Customer::findOrFail($customerId);
                    $customer->tokens()->delete();

                    $newToken = $customer->createToken('auth_token')->plainTextToken;

                    return [
                        'status' => Response::HTTP_OK,
                        'token' => $newToken,
                    ];
                } else {
                    return [
                        'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                        'title' => 'Token vẫn còn hạn sử dụng'
                    ];
                }
            } else {
                return [
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'title' => 'Unauthorized'
                ];
            }
        }
    }
}
