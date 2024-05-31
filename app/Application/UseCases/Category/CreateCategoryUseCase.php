<?php

namespace App\Application\UseCases\Category;

use App\Core\Repositories\CategoryRepository;

class CreateCategoryUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute($category) {
        return $this->categoryRepository->create($category);
    }
}
