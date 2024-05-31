<?php

namespace App\Application\UseCases\Category;

use App\Core\Repositories\CategoryRepository;

class DeleteCategoryUseCase {
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute($id) {
        return $this->categoryRepository->delete($id);
    }
}
