<?php

namespace App\Application\UseCases\Product;

use App\Core\Repositories\ProductRepository;

class CreateProductUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function execute($product) {
        return $this->productRepository->create($product);
    }
}
