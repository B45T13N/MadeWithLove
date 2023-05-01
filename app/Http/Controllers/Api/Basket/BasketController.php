<?php

namespace App\Http\Controllers\Api\Basket;

use App\Exceptions\BasketNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Data\Interface\AddableRepositoryInterface;
use App\Http\Data\Interface\BasketRepositoryInterface;
use App\Http\Data\Interface\ItemRepositoryInterface;
use App\Http\Data\Repository\AddableRepository;
use App\Models\Basket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BasketController extends Controller
{
    public function getCurrentUserBasket(Request $request, string $userId, BasketRepositoryInterface $basketRepository)
    {
        try
        {
            $basket = $basketRepository->getUserBasket($userId);
        }
        catch (BasketNotFoundException $exception)
        {
            $basket = new Basket();
            $basket->userId = $userId;
            $basket->save();
        }
        catch (Exception $exception)
        {
            Log::debug("Error during the recuperation of the user basket");
        }

        return $basket;
    }

    public function addItemToBasket(Request                    $request,
                                    AddableRepositoryInterface $addableRepository,
                                    ItemRepositoryInterface    $itemRepository,
                                    BasketRepositoryInterface  $basketRepository
    )
    {
        $itemId = $request->post('itemId');
        $userId = $request->post('userId');


        try
        {
            $basket = $basketRepository->getUserBasket($userId);

            $isAlreadyAdded = $this->itemIsAlreadyAdded($basket->id, $itemId, $addableRepository);

            if($isAlreadyAdded)
            {
                return \response('Item already added !', 202);
            }
            else
            {
                $addableRepository->insertAddable($itemId, $basket->id);
                $itemRepository->updateItemCounter($itemId);

                return \response('Item successfully added !', 201);
            }
        }
        catch (BasketNotFoundException $exception)
        {
            Log::debug('Error during the getUserBasket function');

            return \response('Error service during the recuperation of the user basket', 404);
        }
        catch (Exception $exception)
        {
            Log::debug('Error during the insert addable or update item counter');

            return response('Error service', 503);
        }
    }

    public function deleteItemFromBasket(int $id, AddableRepositoryInterface $addableRepository)
    {
        return $addableRepository->deleteAddable($id);
    }

    private function itemIsAlreadyAdded(int $basketId, int $itemId, AddableRepositoryInterface $addableRepository): bool
    {
        $itemsAdded = $addableRepository->getItemsAdded($basketId);
        $inArray = false;
        foreach ($itemsAdded as $item)
        {
            if($item->itemId === $itemId)
                $inArray = true;
        }

        return $inArray;
    }
}
