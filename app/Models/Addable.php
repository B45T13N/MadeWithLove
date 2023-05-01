<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Addable extends Model
{
    use HasFactory;
    public function item(): hasOne
    {
        return $this->hasOne(Item::class);
    }

    public function basket(): hasOne
    {
        return $this->hasOne(Basket::class);
    }
}
