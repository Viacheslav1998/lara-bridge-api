<?php  

namespace App\Http\Responses;

class UserResponse
{
	public static function success($data, string $message = "OK", int $code = 200)
	{
		return response()->json([
			'status' => 'success',
			'message' => $message,
			'data' => $data,
		]);	
	}


	public static function error(string $message, int $code = 400)
	{
		return response()->json([
			'status' => 'error',
			'message' => $message
		]);
	}

}