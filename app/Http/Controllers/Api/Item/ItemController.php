<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\Item\ItemResource;
use App\Http\Resources\Item\ItemResourceCollection;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return ItemResourceCollection::collection(Item::query()
            ->where('isPurchased', false)
            ->paginate(8));
    }

    public function getHotDeals(Request $request)
    {
        return ItemResourceCollection::collection(Item::limit(5)
            ->where('isPurchased', false)
            ->get());
    }

    public function getItemById(Request $request, string $id)
    {
        $item = new ItemResourceCollection(Item::findOrFail($id));

        if(!isset($item))
        {
            abort(404, "Item Not found");
        }

        return $item;
    }
}
