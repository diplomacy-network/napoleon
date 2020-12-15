<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function adjudicatable()
    {
        return $this->belongsTo(\App\Models\Play\Adjudicatable::class);
    }

    public function winningPower()
    {
        return $this->belongsTo(\App\Models\Play\Power::class);
    }
}
