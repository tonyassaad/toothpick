<?php

namespace App\Exceptions;

use App\Helper\ResponseOutputHelper;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */



    public function render($request, Throwable $exception)
    {
         return $this->renderExceptionAsJson($exception);

        //return ResponseOutputHelper::customBadRequestMessage($exception->getMessage());
        return parent::render($request, $exception);
    }

    public function renderExceptionAsJson(Throwable $exception)
    {
        $exception = $this->prepareException($exception);
        $status = 422;
        // Default response
        $response = [
            'message' => ['Something Went Wrong'],
            'status_code' => $status,
        ];

        // Build correct status codes and status texts
        switch ($exception) {
            case $exception instanceof ValidationException:

                $response = [
                    'message' => $exception->validator,
                    'code' => $status,
                ];
                return response()->json($response, $status);

            case $exception instanceof ModelNotFoundException:
                $exception = new NotFoundHttpException($exception->getMessage(), $exception);
                // Define the response
                return ResponseOutputHelper::customBadRequestMessage($exception->getMessage());

            default:
                $response = [
                    'message' => $exception->getMessage(),
                    'code' => 400,
                ];

                return response()->json($response, $status);
        }

        return response()->json($response, $status);
    }
}
