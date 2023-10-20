<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adicione o use statement para o modelo User
use Illuminate\Support\Facades\Hash; // Adicione o use statement para o Hash

class UserController extends Controller
{
    public function create(Request $request)
{
    $existingUser = User::where('username', $request->username)->first();

    if ($existingUser) {
        return response()->json(['message' => 'Username already exists'], 400);
    }

    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'User created successfully'], 201);
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
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid username or password'], 401);
        }

        $token = $user->createToken($request->username)->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    
}
