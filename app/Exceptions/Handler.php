<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        // Handle Validation Errors
        if ($exception instanceof ValidationException) {
            $errors = $exception->errors();

            $firstError = collect($errors)->first()[0];

            return response()->json([
                'message' => $firstError,
                'errors' => $errors,
            ], 422);
        }

        // Handle Authentication Errors
        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'message' => 'Unauthenticated',
            ], 401);
        }

        // Handle Model Not Found (404) Errors
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Resource not found',
            ], 404);
        }

        // Handle Route Not Found (404) Errors
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Route not found',
            ], 404);
        }

        // Handle Method Not Allowed (405) Errors
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'message' => 'Method not allowed',
            ], 405);
        }

        // Handle Database Query Errors
        if ($exception instanceof QueryException) {
            return response()->json([
                'message' => 'Database connection error. Please try again later.',
            ], 500);
        }

        // Handle HTTP Exception (Custom status code or message)
        if ($exception instanceof HttpException) {
            return response()->json([
                'message' => $exception->getMessage() ?: 'Something went wrong',
            ], $exception->getStatusCode());
        }

        // General Exception Handling
        return response()->json([
            'message' => 'An error occurred. Please try again later.',
            // 'error' => $exception->getMessage(), // Remove this line in production for security
        ], 500);
    }
}
