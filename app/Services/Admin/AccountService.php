<?php

namespace App\Services\Admin;

use App\Models\Role;
use App\User;
 

class AccountService
{

    public static function getUserByuuid(string $uuid)
    {
        return User::where('uuid', $uuid)->firstOrFail();
    }

    public static function editProfile($uuid, $params): User
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        $street = $params['street'] ?? null;
        $suburb = $params['suburb'] ?? null;
        if ($user->update([
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'email' => $params['email'],
            'mobile_phone' => $params['mobile_phone'],
            'street_address1' => $params['street_address1'],
            'street_address2' => $params['street_address2'],
            'suburb' => $params['suburb'],
            'state' => $params['state'],
            'postal_code' => $params['postal_code'],
        ]) == 1) {
            return $user;
        }
    }
}
