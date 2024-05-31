<?php

namespace App\Application\UseCases\Product;

use App\Core\Repositories\PriceListRepository;

class GetAllPriceListUseCase {
    private $priceListRepository;

    public function __construct(PriceListRepository $priceListRepository) {
        $this->priceListRepository = $priceListRepository;
    }

    public function execute() {
        return $this->priceListRepository->getAll();
    }
}
