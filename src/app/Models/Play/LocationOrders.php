<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class LocationOrders extends Model
{
    use HasFactory;

    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
