<?php

namespace App\Helper;

class ResponseOutputHelper
{
    const SUCCSESS_CODE = 200;
    const FORBIDDEN_CODE = 403;
    const UNAUTHORIZED_CODE = 401;
    const BAD_REQUEST_CODE = 400;

    public static function successPost($data = '')
    {
        return response()->json(['code' => self::SUCCSESS_CODE, 'message' => 'Successfully Saved', 'data' => $data], self::SUCCSESS_CODE);
    }

    public static function failedPost($data, $message)
    {
        return response()->json(['code' => self::BAD_REQUEST_CODE, 'message' => $message], self::BAD_REQUEST_CODE);
    }

    public static function successGet($data)
    {
        return response()->json(['code' => self::SUCCSESS_CODE, 'message' => 'Ok', 'data' => $data], self::SUCCSESS_CODE);
    }

    public static function rawSuccessGet($data)
    {
        return response(['code' => self::SUCCSESS_CODE, 'message' => 'Ok', 'data' => $data], self::SUCCSESS_CODE)->header('Content-Type', 'text/plain');
    }

    public static function customBadRequestMessage($message)
    {
        return response()->json(['code' => self::BAD_REQUEST_CODE, 'message' => $message], self::BAD_REQUEST_CODE);
    }

    public static function customSuccessMessage($message, $data = '')
    {
        return response()->json(['code' => self::SUCCSESS_CODE, 'message' => $message, 'data'=>$data], self::SUCCSESS_CODE);
    }

    public static function forbidden()
    {
        return response()->json(['code' => self::FORBIDDEN_CODE, 'message' => 'Forbidden'], self::FORBIDDEN_CODE);
    }

    public static function unAuthorized()
    {
        return response()->json(['code' => self::UNAUTHORIZED_CODE, 'error' => 'Unauthorized'], self::UNAUTHORIZED_CODE);
    }
}
