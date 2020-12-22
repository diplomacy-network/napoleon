<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class UnitOrder extends Model
{
    use HasFactory;

    public function unit(): HasOne
    {
        return $this->hasOne(Unit::class);
    }

    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }
}
