<?php

namespace App\Application\UseCases\Category;

use App\Core\Repositories\CategoryRepository;

class UpdateCategoryUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute($id, $category) {
        return $this->categoryRepository->update($id, $category);
    }
}
