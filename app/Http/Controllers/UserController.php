<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Tymon\JWTAuth\Facades\JWTAuth as JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
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
                'password' => Hash::make($request->input('password')),
            ]);

            return response()->json(['message' => 'User registered successfully']);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['message' => 'Usuário não encontrado'], 404);
            }

            $existingUser = User::where('username', $request->input('username'))
                ->where('id', '!=', $id)
                ->first();

            if ($existingUser) {
                return response()->json(['message' => 'Nome de usuário já existe'], 400);
            }

            $user->name = $request->input('name');
            $user->username = $request->input('username');

            if ($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            return response()->json(['message' => 'Usuário atualizado com sucesso'], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }





    public function delete(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user) {
                $user->delete();
                return response()->json(['message' => 'User deleted successfully'], 200);
            } else {
                return response()->json(['message' => 'User not found'], 404);
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function get(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user) {
                return response()->json(['user' => $user], 200);
            } else {
                return response()->json(['message' => 'User not found'], 404);
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function getAll()
    {
        try {
            $users = User::all();
            return response()->json(['users' => $users], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['username', 'password']);
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = JWTAuth::fromUser($user);
                return response()->json(['id' => $user->id, 'username' => $user->username, 'token' => $token], 200);
            } else {
                return response()->json(['message' => 'Invalid username or password'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }


    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logged out'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }
}
