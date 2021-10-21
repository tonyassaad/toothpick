<?php

namespace App\Http\Controllers\WebPortal\Auth;

use App\Events\AccountCreatedEvent;
use App\Events\WebAccountCreatedEvent;
use App\Helper\ResponseOutputHelper;
use App\Http\Controllers\Controller;
use App\Jobs\CreateWebUser;
use App\Models\Parents;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Services\Admin\AccountService;
use App\User;
use App\Validators\BaseUserValidator;
use App\Validators\UserProfileValidator;
use App\Validators\WebUserValidator;
use Config;
use Exception;
use Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Ramsey\Uuid\Uuid;
use URL;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function checkAccountExist($email)
    {
        $accountExist = Parents::where('email', $email)->first();

        if (null !== $accountExist) {
            //return ResponseOutputHelper::successGet(['Account-exist' => true]);
            throw new Exception('Email has already been taken');
        }

        return ResponseOutputHelper::successGet(['Account-exist' => false]);
    }

    /**
     * Create a new user with respective role instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function signupParent(Request $request, WebUserValidator $userValidator)
    {
        $userValidator->validate($request->post(), $request->file());

        $this->checkAccountExist($request->get('email'));
        $file = $request->file();
        $parentCreatedData = $this->dispatchNow(new CreateWebUser($request->post()));

        return ResponseOutputHelper::successPost(['please check your email to verify your account', $parentCreatedData]);
    }

    private function isAccountAlreadyConfirmed($uuid)
    {
        if (Parents::where('uuid', $uuid)->where('is_verified', 1)->first()) {
            return true;
        }

        return false;
    }

    public function verifyAccount(Request $request, $uuid)
    {
        if ($this->isAccountAlreadyConfirmed($uuid)) {
            return ResponseOutputHelper::customBadRequestMessage('You already confirmed your account');
        }
        $user = Parents::where('uuid', $uuid)->first();
        if (null == $user) {
            return ResponseOutputHelper::customBadRequestMessage('User not found');
        }

        $user->is_verified = 1;
        $user->email_verified_at = now();
        $user->save();

        return ResponseOutputHelper::customSuccessMessage('Account verified', $user);
    }

    public function editProfile(Request $request, $uuid, UserProfileValidator $userProfileValidator)
    {
        try {
            $userProfileValidator->validate(($request->post()));

            return ResponseOutputHelper::successPost(AccountService::editProfile($uuid, $request->post()));
        } catch (Exception $e) {
            return    ResponseOutputHelper::customBadRequestMessage($e->getMessage());
        }
    }
}
