<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AdjudicationInstance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adjudicatable_id',
        'adjudicatable_type',
        'winning_power_id',
        'variant_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'adjudicatable_id' => 'integer',
        'winning_power_id' => 'integer',
        'variant_id' => 'integer',
    ];


    // Relations
    public function adjudicatable(): MorphTo
    {
        return $this->morphTo();
    }

    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }

    public function winningPower(): BelongsTo
    {
        return $this->belongsTo(Power::class);
    }

    public function phases(): HasMany
    {
        return $this->hasMany(Phase::class);
    }



    // Query
    public function currentPhase(array|string $with = null): Phase
    {
        $q = $this->phases();
        if (! is_null($with)) {
            $q = $q->with($with);
        }

        return $q->orderByDesc('started_at')->first();
    }




}
