<?php

namespace App\Http\Controllers\Auth;

use App\Helper\ResponseOutputHelper;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:api')->except('logout');
     }

    private function validateLoginResposne($credentials)
    {
        $validateUser = User::where('email', $credentials['email'])->first();
        if (null != $validateUser) {
            if (!Hash::check($credentials['password'], $validateUser->password)) {
                throw new Exception('Incorrect Password');
            }
        } else {
            throw new Exception('This email address doesn’t exist in our database. Please enter another email address or create a new account on our website.');
        }
    }

    public function login(Request $request)
    {
        auth()->shouldUse('api');
        $credentials = ['email' => $request->post('email'), 'password' => $request->post('password'), 'is_verified' => 1];

        $this->validateLoginResposne($credentials);

        if ($accessToken = JWTAuth::attempt($credentials)) {
            $user = Auth::getUser();
            $user->access_token = $accessToken;
            $user->save();
             return ResponseOutputHelper::successGet(
                [
                    'user' => $user->load('roles'),
                ]
            );
        } else {
            return ResponseOutputHelper::customBadRequestMessage('Account Is Not Verified');
        }
    }

    public function logout(Request $request)
    {
        $oldToken = JWTAuth::setToken($request->bearerToken());
        try {
            if (Auth::guard('api')->invalidate()) {
                return ResponseOutputHelper::successGet('Successfully logged out');
            }
        } catch (TokenExpiredException $e) {
            return ResponseOutputHelper::customBadRequestMessage($e->getMessage());
        }
    }



}
