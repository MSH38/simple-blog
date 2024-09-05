<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\customResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    use customResponseTrait;
    protected $user;
    public function __construct(User $user) {
        $this->user = $user;
    }
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:8', 
                    'confirmed', 
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
                ],
            ]);

            if ($validator->fails()) {
                return $this->customResponse($validator->errors(), 400);
            }
            $user = $this->user::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = JWTAuth::fromUser($user);
            $user->token = $token;
            $user->save();
            return $this->customResponse(compact('user'), 200, ['message' => 'User registered successfully']);
        } catch (\Exception $e) {
            return $this->customResponse($e->getMessage(), 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            if (!$token = Auth::attempt($credentials)) {
                return $this->customResponse('Unauthorized', 401);
            }

            $user = Auth::user();
            $newToken = JWTAuth::fromUser($user);
            $user->token = $newToken;
            $user->save();
            return $this->customResponse(compact('user'), 200, ['message' => 'Login successful']);
        } catch (\Exception $e) {
            return $this->customResponse($e->getMessage(), 500);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            JWTAuth::invalidate(JWTAuth::getToken());
            // $user->token = null;
            // $user->save();
            return $this->customResponse('Successfully logged out', 200);
        } catch (\Exception $e) {
            return $this->customResponse($e->getMessage(), 500);
        }
    }

}
