<?php

namespace App\Http\Resources\Item;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResourceCollection extends JsonResource
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
            'name' => $this->name,
            'img' => $this->img,
            'price' => $this->price,
            'counterAdded' => $this->counterAdded,
            'isPurchased' => $this->isPurchased,
        ];
    }
}
