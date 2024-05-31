<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\User;
use App\Core\Repositories\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function getById(int $id)
    {
        return User::find($id);
    }

    public function create(array $user)
    {
        return User::create($user);
    }
}
