<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use App\Models\Category;

class UserController extends Controller
{

    public function assignCategory(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'role' => 'required|in:category_admin'
        ]);

        $user = User::findOrFail($request->user_id);

        if ($user->hasRole($request->role)) {
            return response()->json(['message' => 'User already has this role']);
        }

        DB::table('user_roles')->insert([
            'user_id' => $request->user_id,
            'role_id' => DB::table('roles')->where('name', $request->role)->first()->id
        ]);

        return response()->json(['message' => 'Role assigned successfully']);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create($request->validated());

        return response()->json(['message' => 'Category created successfully']);
    }

    public function indexCategory()
    {
        return response()->json(Category::all());
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
