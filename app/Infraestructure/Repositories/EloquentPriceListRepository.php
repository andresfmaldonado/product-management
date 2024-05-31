<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\PriceList;
use App\Core\Repositories\PriceListRepository;

class EloquentPriceListRepository implements PriceListRepository
{
    public function getAll()
    {
        return PriceList::all()->select([
            'product',
            'price'
        ]);
    }

    public function create(array $priceLists)
    {
        PriceList::truncate();
        return PriceList::insert($priceLists);
    }
}
