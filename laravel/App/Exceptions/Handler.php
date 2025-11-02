<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Http\Responses\ApiResponse;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if ($request->is('api/*')) {
            if ($e instanceof ValidationException) {
                return ApiResponse::error(
                    'Validation failed',
                    422,
                    $e->errors()
                );
            }

            if ($e instanceof ModelNotFoundException) {
                return ApiResponse::error(
                    'Resource not found',
                    404
                );
            }

            if ($e instanceof AuthorizationException) {
                return ApiResponse::error(
                    'Forbidden',
                    403
                );
            }

            \Log::error($e);

            return ApiResponse::serverError(
                'Unexpected server error',
                config('app.debug') ? [
                    'exception' => class_basename($e),
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ] : []
            );
        }

        // web requests
        return parent::render($request, $e);
    }
}
