<?php

namespace App\Http\Data\Repository;

use App\Exceptions\BasketNotFoundException;
use App\Http\Data\Interface\BasketRepositoryInterface;
use App\Http\Resources\Basket\BasketResourceCollection;
use App\Models\Basket;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BasketRepository implements BasketRepositoryInterface
{
    public function getUserBasket(string $userId): BasketResourceCollection
    {

        try
        {
            $basket = new BasketResourceCollection(Basket::query()
                ->where('userId', $userId)->firstOrFail());

            return $basket;
        }
        catch (ModelNotFoundException $e)
        {
            throw new BasketNotFoundException();
        }
    }
}
