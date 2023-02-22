<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ])->validate();

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$token = Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Authentication failed'], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ]);
    }

    public function login(Request $request)
    {
        Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Authentication failed'], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ]);
    }
}
