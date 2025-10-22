<?php  

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
	public static function success($data, string $message = "OK", int $code = 200): JsonResponse
	{
		return response()->json([
			'status' => 'success',
			'message' => $message,
			'data' => $data,
		], $code);	
	}

	  public static function error(string $message = 'Error', int $code = 400, $errors = null): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }

    public static function notFound(string $message = 'Resource not found'): JsonResponse
    {
        return self::error($message, 404);
    }

    public static function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return self::error($message, 401);
    }

    public static function validationError($errors, string $message = 'Validation failed'): JsonResponse
    {
        return self::error($message, 422, $errors);
    }

}