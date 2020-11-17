<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['signin']]);
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $email      = $request->email;
        $password   = $request->password;
        $hashed     = md5($password . $email);
        
        try {
            $user = User::where(['userclient_email' => $email, 'userclient_password' => $hashed])->firstOrFail();
            if (!empty($user)) {
                $token = auth()->login($user);
                return $this->respondWithToken($token, $user);
            } else {
                return response()->json(['message' => 'Not found'], 404);
            }
        } catch (Exception $th) {
            return response()->json(['message' => 'Login failed', 'errors' => $th], 409);
        }
    }

    public function signout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh(), '');
    }

    protected function respondWithToken($token, $data)
    {
        return response()->json([
            'data' => $data,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 120
        ], 200);
    }
}
