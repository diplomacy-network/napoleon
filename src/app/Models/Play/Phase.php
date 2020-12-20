<?php

namespace App\Models\Play;

use App\Enums\Play\PhaseTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adjudication_instance_id',
        'season',
        'year',
        'type',
        'started_at',
        'length',
        'adjudicated',
        'next_phase_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'adjudication_instance_id' => 'integer',
        'started_at' => 'datetime',
        'adjudicated' => 'boolean',
        'previous_phase_id' => 'integer',
        'type' => PhaseTypeEnum::class,
    ];


    // Relationships
    public function adjudicationInstance(): BelongsTo
    {
        return $this->belongsTo(AdjudicationInstance::class);
    }

    public function previousPhase(): BelongsTo
    {
        return $this->belongsTo(Phase::class);
    }

    // Scopes
    public function scopeCurrent(Builder $query): Builder
    {
        return $query->where('next_phase_id', null);
    }
}
