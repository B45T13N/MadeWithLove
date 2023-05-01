<?php

namespace App\Http\Resources\Basket;

use App\Http\Resources\Addable\AddableResource;
use App\Models\Addable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BasketResourceCollection extends JsonResource
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
            'userId' => $this->userId,
            'itemsAdded' => AddableResource::collection(Addable::query()->where('basketId', $this->id)->get())
        ];
    }
}
