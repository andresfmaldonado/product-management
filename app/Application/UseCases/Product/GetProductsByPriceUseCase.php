<?php

namespace App\Application\UseCases\Product;

use App\Core\Repositories\ProductRepository;

class GetProductsByPriceUseCase {
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function execute($price) {
        return $this->productRepository->getByPrice($price);
    }
}
