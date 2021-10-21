<?php

namespace App\Http\Controllers\Auth;

use App\Events\AccountCreatedEvent;
use App\Helper\ResponseOutputHelper;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Services\Admin\AccountService;
use App\User;
use App\Validators\BaseUserValidator;
use App\Validators\UserProfileValidator;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function editProfile(Request $request, $uuid)
    {
        return ResponseOutputHelper::successPost(AccountService::editProfile($uuid, $request->post()));
    }

    public function loadProfileByUuid($uuid)
    {
        return ResponseOutputHelper::successGet(AccountService::getUserByuuid($uuid));
    }
}
