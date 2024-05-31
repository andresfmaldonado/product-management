<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Category;
use App\Core\Repositories\CategoryRepository;

class EloquentCategoryRepository implements CategoryRepository
{
    function getAll()
    {
        return Category::all();
    }

    function getById(int $id)
    {
        return Category::find($id);
    }

    function create(array $category)
    {
        return Category::create($category);
    }

    function update(int $id, array $category)
    {
        return Category::find($id)->update($category);
    }

    function delete(int $id)
    {
        return Category::find($id)->delete();
    }
}
