<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Product\CreateProductUseCase;
use App\Application\UseCases\Product\DeleteProductUseCase;
use App\Application\UseCases\Product\GetAllProductsUseCase;
use App\Application\UseCases\Product\GetProductByIdUseCase;
use App\Application\UseCases\Product\GetProductsByCategoryUseCase;
use App\Application\UseCases\Product\GetProductsByPriceUseCase;
use App\Application\UseCases\Product\UpdateProductUseCase;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function index(GetAllProductsUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function getById(int $id, GetProductByIdUseCase $useCase)
    {
        return $useCase->execute($id);
    }

    public function getByCategory(int $categoryId, GetProductsByCategoryUseCase $useCase)
    {
        return $useCase->execute($categoryId);
    }

    public function getByPrice(float $price, GetProductsByPriceUseCase $useCase)
    {
        return $useCase->execute($price);
    }

    public function store(CreateProductRequest $product, CreateProductUseCase $useCase)
    {
        try {
            return $useCase->execute($product->validated());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update(int $id, UpdateProductRequest $product, UpdateProductUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $product->validated());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id, DeleteProductUseCase $useCase) {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
