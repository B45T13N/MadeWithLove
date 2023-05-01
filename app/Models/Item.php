<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Item extends Model
{
    use HasFactory;

    public function baskets(): MorphToMany
    {
        return $this->morphedByMany(Basket::class, 'addable');
    }
}
