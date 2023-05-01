<?php

namespace App\Http\Resources\Addable;

use App\Http\Resources\Basket\BasketResourceCollection;
use App\Http\Resources\Item\ItemResourceCollection;
use App\Models\Basket;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'item' => new ItemResourceCollection(Item::query()->where('id', $this->itemId)->firstOrFail()),
        ];
    }
}
