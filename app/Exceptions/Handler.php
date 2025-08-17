<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // 404 Not Found
        $this->renderable(function (NotFoundHttpException $exception, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Resource not found.'
                ], JsonResponse::HTTP_NOT_FOUND);
            }
        });

        // 422 Validation Exception
        $this->renderable(function (ValidationException $exception, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Validation failed.',
                    'errors' => $exception->errors(),
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }
        });

        // Fallback for all other exceptions
        $this->renderable(function (Throwable $exception, $request) {
            if ($request->is('api/*')) {
                $status = $exception instanceof HttpException ? $exception->getStatusCode() : JsonResponse::HTTP_INTERNAL_SERVER_ERROR;
                $response = [
                    'message' => 'An error occurred.',
                ];
                if (config('app.debug')) {
                    $response['exception'] = get_class($exception);
                    $response['details'] = $exception->getMessage();
                }
                return response()->json($response, $status);
            }
        });
    }
}
