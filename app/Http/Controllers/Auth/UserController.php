<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Incorrect email or password. Please try again.'], 401);
        }

        $user = User::where('email', $credentials['email'])->firstOrFail();

        $token = $user->createToken('admin')->plainTextToken;

        return response()->json([
            'user' => $user,
            'type' => $user->type,
            'access_token' => $token,
        ]);
    }

    public function logout()
    {
        auth()->user()->currentaccesstoken()->delete();
        Auth::logout();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
