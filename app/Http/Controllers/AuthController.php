<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserRequestCodeRequest;
use App\Models\Activation;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $activation = Activation::where(['phone' => $request->phone, 'code' => $request->code])->first();
        if (!$activation) {
            return ['status' => 'error', 'message' => 'phone not verified'];
        }
        $activation->delete();

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }
    public function requestCode(UserRequestCodeRequest $request)
    {
        $code = rand(100000, 999999);
        Activation::create(['phone' => $request->phone, 'code' => $code]);
        return ['status' => 'ok', 'message' => 'code sent'];
    }
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only(['phone', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
