<?php

namespace App\Http\Data\Interface;

use App\Models\Addable;

interface AddableRepositoryInterface
{
    public function insertAddable(int $itemId, int $basketId);
    public function getItemsAdded(int $basketId);
    public function getAddable(int $id);
    public function deleteAddable(int $id);
}
