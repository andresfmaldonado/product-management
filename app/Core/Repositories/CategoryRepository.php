<?php

namespace App\Core\Repositories;

interface CategoryRepository {
    public function getAll();
    public function getById(int $id);
    public function create(array $category);
    public function update(int $id, array $category);
    public function delete(int $id);
}
