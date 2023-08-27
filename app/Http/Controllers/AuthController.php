<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'Вы ввели некорректные данные'
            ], 422);
        }
        $user = Auth::user();
        if (!$user->is_admin) {
            Auth::logout();
            return response([
                'error' => 'Вы не являетесь администратором и не можете войти в админ парень'
            ], 403);
    }
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => new UserResource($user),
            'token' => $token
        ]);
    }


    /** @var User $user */
    public function logout()
    {
        $user = Auth::user();
        //Revoke the token that has used to authenticate the current request
        $user->currentAccessToken()->delete();

        return response('', 204);
    }

    public function getUser(Request $request) {
        return new UserResource($request->user());
    }
}

