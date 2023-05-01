<?php

namespace App\Http\Data\Repository;

use App\Http\Data\Interface\AddableRepositoryInterface;
use App\Models\Addable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddableRepository implements AddableRepositoryInterface
{
    public function insertAddable(int $itemId, int $basketId)
    {
        return DB::table('addables')->insert(
            [
                'itemId' => $itemId,
                'basketId' => $basketId,
                'created_at' => Carbon::now('Europe/Paris'),
                'updated_at' => Carbon::now('Europe/Paris'),
            ]
        );
    }

    public function getItemsAdded(int $basketId)
    {
        return DB::table('addables')->where('basketId', $basketId)->get();
    }

    public function getAddable(int $id)
    {
        return DB::table('addables')->find($id);;
    }

    public function deleteAddable(int $id)
    {
        $addable = Addable::query()->firstOrFail('id', $id);

        if($addable)
            $addable->delete();
        else
            return abort(404);

        return response()->json(null);
    }
}
