<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'next_phase_id' => 'integer',
    ];


    public function adjudicationInstance()
    {
        return $this->belongsTo(\App\Models\Play\AdjudicationInstance::class);
    }

    public function nextPhase()
    {
        return $this->belongsTo(\App\Models\Play\Phase::class);
    }
}
