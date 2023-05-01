<?php

namespace App\Http\Data\Repository;

use App\Http\Data\Interface\ItemRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ItemRepository implements ItemRepositoryInterface
{

    public function updateItemCounter(int $itemId)
    {
        return DB::table('items')
            ->where('id', $itemId)
            ->increment('counterAdded');
    }
}
