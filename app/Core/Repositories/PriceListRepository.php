<?php

namespace App\Core\Repositories;

interface PriceListRepository {
    public function getAll();
    public function create(array $priceList);
}
