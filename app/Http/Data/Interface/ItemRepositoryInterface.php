<?php

namespace App\Http\Data\Interface;

interface ItemRepositoryInterface
{
    public function updateItemCounter(int $itemId);
}
