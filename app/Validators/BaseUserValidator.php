<?php

namespace App\Validators;

class BaseUserValidator extends BaseValidator
{
    public $rules = [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required',  'email', 'unique:users', 'max:255'],
        //'password' => ['string', 'min:8','/(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/'],
        'password' => '|min:8|regex:/(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?=.*[A-Z])(?=.*[a-z]).*$/',
        'profile_picture' => ['required'],

    ];
    // public $customErrors=[
    //     'custom' => [
    //         'password' => [
    //             'regex' => 'custom-message',
    //         ],
    //     ],
    // ];
}

/**
 * English uppercase characters (A – Z)
* English lowercase characters (a – z)
* Base 10 digits (0 – 9)
* Non-alphanumeric (For example: !, $, #, or %)
 *'regex:(^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$)'
 */
