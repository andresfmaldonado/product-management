<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Category\CreateCategoryUseCase;
use App\Application\UseCases\Category\DeleteCategoryUseCase;
use App\Application\UseCases\Category\GetAllCategoriesUseCase;
use App\Application\UseCases\Category\GetCategoryByIdUseCase;
use App\Application\UseCases\Category\UpdateCategoryUseCase;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     *  @OA\Get(
     *      path="/api/category/",
     *      summary="Find all categories",
     *      tags={"categories"},
     *      description="Find all categories",
     *      operationId="indexCategories",
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
     *                      example="bananas"
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
    public function index(GetAllCategoriesUseCase $useCase)
    {
        return $useCase->execute();
    }

    /**
     *  @OA\Get(
     *      path="/api/category/{id}",
     *      summary="Find one category",
     *      tags={"categories"},
     *      description="Find one category",
     *      operationId="getByIdCategory",
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
     *          description="Category id",
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
    public function getById(int $id, GetCategoryByIdUseCase $useCase)
    {
        return $useCase->execute($id);
    }

    /**
     * @OA\Post(
     *      path="/api/category/",
     *      operationId="storeCategory",
     *      tags={"categories"},
     *      summary="Create category",
     *      description="Create category",
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
     *              )
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
    public function store(CreateCategoryRequest $category, CreateCategoryUseCase $useCase)
    {
        try {
            return $useCase->execute($category->validated());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Put(
     *      path="/api/category/{id}",
     *      operationId="updateCategory",
     *      tags={"categories"},
     *      summary="Update category",
     *      description="Update category",
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
     *              type="integer"
     *          ),
     *          description="Category Id",
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @Oa\Property(
     *                  property="name",
     *                  type="string",
     *                  example="bananas"
     *              )
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
     *          response=200,
     *          description="OK"
     *      )
     *  )
     */
    public function update(int $id, UpdateCategoryRequest $category, UpdateCategoryUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $category->validated());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/category/{id}",
     *      operationId="destroyCategory",
     *      tags={"categories"},
     *      summary="Destroy category",
     *      description="Destroy category",
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
     *              type="integer"
     *          ),
     *          description="Category Id",
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
     *          description="OK"
     *      )
     *  )
     */
    public function destroy(int $id, DeleteCategoryUseCase $useCase) {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
