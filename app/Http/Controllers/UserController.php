<?php

namespace App\Http\Controllers;

use App\Application\UseCases\User\CreateUserUseCase;
use App\Application\UseCases\User\GetAllUsersUseCase;
use App\Application\UseCases\User\GetUserByIdUseCase;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
    public function index(GetAllUsersUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function getById(int $id, GetUserByIdUseCase $useCase)
    {
        return $useCase->execute($id);
    }

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
