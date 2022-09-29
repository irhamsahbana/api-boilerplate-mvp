<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Libs\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function attempt(Request $request)
    {
        $fields = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $rules = [
            'username' => ['required'],
            'password' => ['required']
        ];

        $validator = Validator::make($fields, $rules);
        if ($validator->fails())
            return Response::json(null, $validator->errors(), 422);


       if (Auth::attempt($fields)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return Response::json([
                'token' => $token,
                'user' => $user,
            ], 'Login success', 200);
        }

        return Response::json(null, 'Invalid login credentials.', 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return Response::json(null, 'Logout success', 200);
    }
}
