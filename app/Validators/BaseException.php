<?php

/**
 * Created by PhpStorm.
 * User: iarnous
 * Date: 7/4/18
 * Time: 9:01 AM.
 */

namespace App\Validators;

use Exception;
use Throwable;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class BaseException extends ValidationException
{
    protected $errors;

    public function __construct($errors = null, Exception $previous = null, array $headers = [], $code = 0)
    {
        $this->setErrors($errors);
        parent::__construct($errors, $previous, $headers, $code);
    }

    protected function setErrors($errors)
    {
        if (is_string($errors)) {
            $errors = ['error' => $errors];
        }

        if (is_array($errors)) {
            $errors = new MessageBag($errors);
        }

        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
