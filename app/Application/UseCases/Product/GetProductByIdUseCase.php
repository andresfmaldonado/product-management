<?php

namespace App\Application\UseCases\Product;

use App\Core\Repositories\ProductRepository;

class GetProductByIdUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function execute($id) {
        return $this->productRepository->getById($id);
    }
}
