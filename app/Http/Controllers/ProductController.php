<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Product\CreateProductUseCase;
use App\Application\UseCases\Product\DeleteProductUseCase;
use App\Application\UseCases\Product\GetAllPriceListUseCase;
use App\Application\UseCases\Product\GetAllProductsUseCase;
use App\Application\UseCases\Product\GetProductByIdUseCase;
use App\Application\UseCases\Product\GetProductsByCategoryUseCase;
use App\Application\UseCases\Product\GetProductsByPriceUseCase;
use App\Application\UseCases\Product\UpdatePriceListUseCase;
use App\Application\UseCases\Product\UpdateProductUseCase;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use OpenApi\Annotations as OA;

/**
 *  @OA\Info(
 *      title="Products Management",
 *      version="v1"
 *  ),
 */
class ProductController extends Controller
{

    /**
     *  @OA\Get(
     *      path="/api/product/",
     *      summary="Find all products",
     *      tags={"products"},
     *      description="Find all products",
     *      operationId="indexProducts",
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
     *                      property="price",
     *                      type="float",
     *                      example="2000"
     *                  ),
     *                  @OA\Property(
     *                      property="stock",
     *                      type="integer",
     *                      example=5
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
    public function index(GetAllProductsUseCase $useCase)
    {
        return $useCase->execute();
    }

    /**
     *  @OA\Get(
     *      path="/api/product/{id}",
     *      summary="Find one product",
     *      tags={"products"},
     *      description="Find one product",
     *      operationId="getByIdProduct",
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
     *          description="Product id",
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
     *  ),
     */
    public function getById(int $id, GetProductByIdUseCase $useCase)
    {
        return $useCase->execute($id);
    }

    /**
     *  @OA\Get(
     *      path="/api/product/category/{categoryId}",
     *      summary="Find all products by category id",
     *      tags={"products"},
     *      description="Find all products by category id",
     *      operationId="getByCategoryIdProduct",
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
     *          name="categoryId",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
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
     *                      property="price",
     *                      type="float",
     *                      example="2000"
     *                  ),
     *                  @OA\Property(
     *                      property="stock",
     *                      type="integer",
     *                      example=5
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
    public function getByCategory(int $categoryId, GetProductsByCategoryUseCase $useCase)
    {
        return $useCase->execute($categoryId);
    }

    /**
     *  @OA\Get(
     *      path="/api/product/price/{price}",
     *      summary="Find all products by price",
     *      tags={"products"},
     *      description="Find all products by price",
     *      operationId="getByPriceProduct",
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
     *          name="price",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="float"
     *          ),
     *          description="Price",
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
     *                      property="price",
     *                      type="float",
     *                      example="2000"
     *                  ),
     *                  @OA\Property(
     *                      property="stock",
     *                      type="integer",
     *                      example=5
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
    public function getByPrice(float $price, GetProductsByPriceUseCase $useCase)
    {
        return $useCase->execute($price);
    }

    /**
     * @OA\Post(
     *      path="/api/product/",
     *      operationId="storeProduct",
     *      tags={"products"},
     *      summary="Create product",
     *      description="Create product",
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
     *                  property="price",
     *                  type="float",
     *                  example=2000
     *              ),
     *              @Oa\Property(
     *                  property="stock",
     *                  type="integer",
     *                  example=5
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
    public function store(CreateProductRequest $product, CreateProductUseCase $useCase, UpdatePriceListUseCase $useCasePriceList)
    {
        try {
            $product = $useCase->execute($product->validated());
            $useCasePriceList->execute();
            return $product;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Put(
     *      path="/api/product/{id}",
     *      operationId="updateProduct",
     *      tags={"products"},
     *      summary="Update product",
     *      description="Update product",
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
     *          description="Product Id",
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
     *                  property="price",
     *                  type="float",
     *                  example=2000
     *              ),
     *              @Oa\Property(
     *                  property="stock",
     *                  type="integer",
     *                  example=5
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
     *          response=200,
     *          description="OK"
     *      )
     *  )
     */
    public function update(int $id, UpdateProductRequest $product, UpdateProductUseCase $useCase, UpdatePriceListUseCase $useCasePriceList)
    {
        try {
            $product = $useCase->execute($id, $product->validated());
            $useCasePriceList->execute();
            return $product;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/product/{id}",
     *      operationId="destroyProduct",
     *      tags={"products"},
     *      summary="Destroy product",
     *      description="Destroy product",
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
     *          description="Product Id",
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
    public function destroy(int $id, DeleteProductUseCase $useCase, UpdatePriceListUseCase $useCasePriceList)
    {
        try {
            $product = $useCase->execute($id);
            $useCasePriceList->execute();
            return $product;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/api/product/price-list",
     *      operationId="priceList",
     *      tags={"product"},
     *      summary="Get Price List",
     *      description="Get Price List",
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
     *                      property="product",
     *                      type="string",
     *                      example="bananas"
     *                  ),
     *                  @OA\Property(
     *                      property="price",
     *                      type="float",
     *                      example="2000"
     *                  ),
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
     * )
     */
    public function getPriceList(GetAllPriceListUseCase $useCase)
    {
        try {
            return $useCase->execute();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
