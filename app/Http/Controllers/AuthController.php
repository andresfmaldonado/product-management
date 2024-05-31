<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function createNewToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            'user' => Auth::guard('api')->user(),
        ]);
    }

    /**
    * @OA\Post(
    *      path="/api/auth",
    *      operationId="login",
    *      tags={"authentication"},
    *      summary="JWT Token",
    *      description="JWT Token",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(
    *              @OA\Property(property="email", type="string", example="admin@admin.com"),
    *              @OA\Property(property="password", type="string", example="xXxXxXxX")
    *          )
    *      ),
    *      @OA\Response(
    *          response="200",
    *          description="OK",
    *          @OA\JsonContent(
    *              @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2F1dGgiLCJpYXQiOjE3MTcxODg3MzgsImV4cCI6MTcxNzE5MjMzOCwibmJmIjoxNzE3MTg4NzM4LCJqdGkiOiJDcDlkR0s2aXMwRm1ibVZoIiwic3ViIjoiMSIsInBydiI6IjY1OGJhZjZjMjljNWUzZTBmZTM1YzMwOWI1ZjJkNGRjZjJmMDg2N2IifQ.gYV3Mnt0abua4EupGICuOw9_J5L9tUkSNz3nktcbbVI"),
    *              @OA\Property(property="token_type", type="string", example="Bearer"),
    *              @OA\Property(property="expires_in", type="integer", example=3600),
    *              @OA\Property(
    *                    property="user",
    *                    type="object",
    *                    @OA\Property(property="id", type="integer", example=1),
    *                    @OA\Property(property="name", type="string", example="Pepito Perez"),
    *                    @OA\Property(property="email", type="string", example="example@example.com"),
    *                    @OA\Property(property="email_verified_at", type="string", example="null"),
    *                    @OA\Property(property="created_at", type="string", example="2024-05-31T14:31:26.000000Z"),
    *                    @OA\Property(property="updated_at", type="string", example="2024-05-31T14:31:26.000000Z")
    *              )
    *          )
    *       ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthorized",
    *           @OA\JsonContent(
    *              @OA\Property(
    *                  property="error",
    *                  type="string",
    *                  example="Not Authorized"
    *              )
    *          )
    *      ),
    *  )
    */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Not Authorized'], 401);
        }

        return $this->createNewToken($token);
    }
}
