<?php

namespace App\Http\Data\Interface;

use App\Exceptions\BasketNotFoundException;
use App\Http\Resources\Basket\BasketResourceCollection;

interface BasketRepositoryInterface
{
    /**
     * @throws BasketNotFoundException
     */
    public function getUserBasket(string $userId): BasketResourceCollection;
}
