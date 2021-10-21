<?php

namespace App\Validators;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Factory as IlluminateValidator;
use App\Validators\BaseException;

abstract class BaseValidator
{
    public $validator;

    protected $messageBag;


    public function __construct(IlluminateValidator $validator, MessageBag $messageBag)
    {
        $this->validator = $validator;
        $this->messageBag = $messageBag;
    }

    public function validateOld(array $data, array $rules = [], array $customErrors = [])
    {
        if (empty($rules) && !empty($this->rules) && is_array($this->rules)) {
            $rules = $this->rules;
        }
        /**Create validator instance using the use Illuminate\Validation\Factory  */
        $validation = $this->validator->make($data, $rules, $customErrors);

        if ($validation->fails()) {
            $this->messageBag->add('error', $validation->errors(), 'message', $validation->errors()->all());
            $validationErrors = $validation->errors()->toArray();

            $errorToDisplay = [];
            foreach ($validationErrors as $errors) {
                foreach ($errors as $error) {
                    array_push($errorToDisplay, $error);
                }
            }

            $responsePayload = [
                'success' => false,
                'message' => 'Validation error',
                'status_code' => 422,
                'errors' => implode(',', $errorToDisplay),
            ];
            $message = $validation->errors()->all();

            //  throw new HttpResponseException(response()->json(['status' => $responsePayload['status_code'],'messages' => $message]));
            $response = new JsonResponse($responsePayload['errors'], $responsePayload['status_code']);

            //throw new BaseValidationException($this, $response);
        }

        return true;
    }
    public function validate(array $data, array $rules = [], array $customErrors = [])
    {
        if (empty($rules) && !empty($this->rules) && is_array($this->rules)) {
            $rules = $this->rules;
        }
        $validation = $this->validator->make($data, $rules, $customErrors);
        if ($validation->fails()) {

            $this->messageBag->add('error', $validation->errors(), 'message', $validation->errors()->all());
            $validationErrors = $validation->errors()->toArray();

            $errorToDisplay = [];
            foreach ($validationErrors as $errors) {
                foreach ($errors as $error) {
                    array_push($errorToDisplay, $error);
                }
            }
            $message = $validation->errors()->all();
            throw new BaseException($message);
        }

        return true;
    }
}
