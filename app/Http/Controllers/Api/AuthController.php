<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    /**
     * Get user data
     * @param Request $request
     * 
     * @return User
     */
    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * Login by username
     * @param Request $request
     * 
     * @return User
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('login-username')->plainTextToken;
    }

    /**
     * Login by phone, if phone not registered, register it
     * @param Request $request
     * 
     * @return User
     */
    public function phone(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            $newUser = User::create([
                'phone' => $request->phone
            ]);

            return $newUser->createToken('login-phone')->plainTextToken;
        }

        return $user->createToken('login-phone')->plainTextToken;
    }
}
