<?php

namespace App\Core\Repositories;

interface ProductRepository {
    public function getAll();
    public function getByCategory(int $categoryId);
    public function getByPrice(float $price);
    public function getById(int $id);
    public function create(array $product);
    public function update(int $id, array $product);
}
