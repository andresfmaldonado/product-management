<?php

namespace App\Application\UseCases\Product;

use App\Core\Repositories\PriceListRepository;
use App\Core\Repositories\ProductRepository;

class UpdatePriceListUseCase {
    private $productRepository;
    private $priceListRepository;

    public function __construct(ProductRepository $productRepository, PriceListRepository $priceListRepository) {
        $this->productRepository = $productRepository;
        $this->priceListRepository = $priceListRepository;
    }

    public function execute() {
        $products = $this->productRepository->getAll();
        $productList = [];
        foreach ($products as $value) {
            $productList[] = [
                'product' => $value->name,
                'price' => $value->price
            ];
        }
        return $this->priceListRepository->create($productList);
    }
}
