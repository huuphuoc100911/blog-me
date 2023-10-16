<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $admin = Admin::where('email', $request->email)->orderBy('id')->first();

            if (!$admin) {
                return response()->json([
                    'existEmail' => false,
                    'message' => 'Không tìm thấy tài khoản nào có địa chỉ email này',
                ]);
            }

            if (!Hash::check($request->password, $admin->password, [])) {
                throw new \Exception('Error in Login');
            }

            $tokenResult = $admin->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'adminLogin' => $admin,
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function logout()
    {
    }
}
