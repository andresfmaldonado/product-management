<?php

namespace App\Core\Repositories;

interface UserRepository {
    public function getAll();
    public function getById(int $id);
    public function create(array $user);
}
