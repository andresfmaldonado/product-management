<?php

namespace App\Http\Controllers;

use App\Application\UseCases\User\CreateUserUseCase;
use App\Application\UseCases\User\GetAllUsersUseCase;
use App\Application\UseCases\User\GetUserByIdUseCase;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
    /**
     *  @OA\Get(
     *      path="/api/user/",
     *      summary="Find all users",
     *      tags={"users"},
     *      description="Find all users",
     *      operationId="indexUsers",
     *      @OA\Parameter(
     *          name="Authorization",
     *          in="header",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *          description="Bearer Token",
     *      ),
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
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(
     *                      property="id",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="Pepito Perez"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      example="example@example.com"
     *                  ),
     *                  @OA\Property(
     *                      property="created_at",
     *                      type="string",
     *                      example="2024-05-17T22:04:48.000000Z"
     *                  ),
     *                  @OA\Property(
     *                      property="updated_at",
     *                      type="string",
     *                      example="2024-05-17T22:04:48.000000Z"
     *                  ),
     *              )
     *          )
     *      )
     *  )
     */
    public function index(GetAllUsersUseCase $useCase)
    {
        return $useCase->execute();
    }

    /**
     *  @OA\Get(
     *      path="/api/user/{id}",
     *      summary="Find one user",
     *      tags={"users"},
     *      description="Find one user",
     *      operationId="getByIdUser",
     *      @OA\Parameter(
     *          name="Authorization",
     *          in="header",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *          description="Bearer Token",
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *          description="User id",
     *      ),
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
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="id",
     *                  type="integer",
     *                  example=1
     *              ),
     *              @OA\Property(
     *                  property="name",
     *                  type="string",
     *                  example="bananas"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  example="example@example.com"
     *              ),
     *              @OA\Property(
     *                  property="created_at",
     *                  type="string",
     *                  example="2024-05-17T22:04:48.000000Z"
     *              ),
     *              @OA\Property(
     *                  property="updated_at",
     *                  type="string",
     *                  example="2024-05-17T22:04:48.000000Z"
     *              ),
     *          )
     *      )
     *  ),
     */
    public function getById(int $id, GetUserByIdUseCase $useCase)
    {
        return $useCase->execute($id);
    }

    /**
     * @OA\Post(
     *      path="/api/user/",
     *      operationId="storeUser",
     *      tags={"users"},
     *      summary="Create user",
     *      description="Create user",
     *      @OA\Parameter(
     *          name="Authorization",
     *          in="header",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *          description="Bearer Token",
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @Oa\Property(
     *                  property="name",
     *                  type="string",
     *                  example="bananas"
     *              ),
     *              @Oa\Property(
     *                  property="email",
     *                  type="string",
     *                  example="example@example.com"
     *              ),
     *              @Oa\Property(
     *                  property="password",
     *                  type="string",
     *                  example="xXxXxXxX"
     *              ),
     *          )
     *      ),
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
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="id",
     *                  type="integer",
     *                  example=1
     *              ),
     *              @OA\Property(
     *                  property="name",
     *                  type="string",
     *                  example="bananas"
     *              ),
     *              @OA\Property(
     *                  property="price",
     *                  type="float",
     *                  example="2000"
     *              ),
     *              @OA\Property(
     *                  property="stock",
     *                  type="integer",
     *                  example=5
     *              ),
     *              @OA\Property(
     *                  property="created_at",
     *                  type="string",
     *                  example="2024-05-17T22:04:48.000000Z"
     *              ),
     *              @OA\Property(
     *                  property="updated_at",
     *                  type="string",
     *                  example="2024-05-17T22:04:48.000000Z"
     *              ),
     *          )
     *      )
     *  )
     */
    public function store(CreateUserRequest $user, CreateUserUseCase $useCase)
    {
        try {
            return $useCase->execute($user->validated());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
