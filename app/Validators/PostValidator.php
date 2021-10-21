<?php

namespace App\Validators;

use Illuminate\Validation\Rule;

class PostValidator extends BaseValidator
{
    private function validateCert()
    {
        //return Rule::exists(['organic_certified']);
    }

    public $rules = [
        'title' => ['required'],
        'sub_title' => ['required'],
        'description' => ['required'],
    ];
}
