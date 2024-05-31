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
    public function index(GetAllCategoriesUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function getById(int $id, GetCategoryByIdUseCase $useCase)
    {
        return $useCase->execute($id);
    }

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
