<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    ];


    public function adjudicatable(): MorphTo
    {
         return $this->morphTo();
    }

    public function winningPower()
    {
        return $this->belongsTo(Power::class);
    }


}
