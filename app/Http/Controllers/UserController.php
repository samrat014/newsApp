<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class UserController extends Controller
{

    public function assignCategory(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'role' => 'required|in:category_admin'
        ]);

        $user = User::findOrFail($request->user_id);

        $user->assignRole($request->role);

        return response()->json(['message' => 'Role assigned successfully']);
    }
}
