<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Product;
use App\Core\Repositories\ProductRepository;

class EloquentProductRepository implements ProductRepository
{
    function getAll()
    {
        return Product::all();
    }

    function getById(int $id)
    {
        return Product::find($id);
    }

    function getByCategory(int $categoryId)
    {
        return Product::with('categories')->where('id', $categoryId)->get();
    }

    function getByPrice(float $price)
    {
        return Product::where('price', $price)->get();
    }

    function create(array $product)
    {
        return Product::create($product);
    }

    function update(int $id, array $product)
    {
        return Product::find($id)->update($product);
    }

    function delete(int $id)
    {
        return Product::find($id)->delete();
    }
}
