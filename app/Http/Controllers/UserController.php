<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adicione o use statement para o modelo User
use Illuminate\Support\Facades\Hash; // Adicione o use statement para o Hash
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }

public function update(Request $request)
{
    $existingUser = User::where('username', $request->username)
        ->where('id', '!=', $request->id)
        ->first();

    if ($existingUser) {
        return response()->json(['message' => 'Username already exists'], 400);
    }

    $user = User::find($request->id);
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json(['message' => 'User updated successfully'], 200);
}


    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function get(Request $request)
    {
        $user = User::find($request->id);

        return response()->json(['user' => $user], 200);
    }

    public function getAll(Request $request)
    {
        $users = User::all();

        return response()->json(['users' => $users], 200);
    }

    public function login(Request $request)
        {
            $credentials = $request->only(['username', 'password']);
            if (Auth::attempt($credentials) != 1) {
                return response()->json(['message' => 'Invalid username or password'], 401);
            }

            $user = $request->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
        }

    
}
