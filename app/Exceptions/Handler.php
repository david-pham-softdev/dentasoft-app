<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
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
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $e)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            if ($e instanceof HttpException) {
                return response()->json([
                    'data' => (object)[],
                    'message' => 'HTTP error',
                    'status' => false,
                ], $e->getStatusCode());
            }
            if ($e instanceof AuthenticationException) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => false
                ], 401);
            }
            if ($e instanceof AuthorizationException) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => false
                ], 403);
            }
            if ($e instanceof RouteNotFoundException || $e instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => false
                ], 404);
            }
            if ($e instanceof ValidationException) {
                return response()->json([
                    'data' => $e->errors(),
                    'message' => 'Validation errors',
                    'status' => false,
                ], 422);
            }
        }

        return parent::render($request, $e);
    }
}
