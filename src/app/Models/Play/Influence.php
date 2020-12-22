<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phase_id',
        'power_id',
        'province_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phase_id' => 'integer',
        'power_id' => 'integer',
        'province_id' => 'integer',
    ];


    public function phase()
    {
        return $this->belongsTo(\App\Models\Play\Phase::class);
    }

    public function power()
    {
        return $this->belongsTo(\App\Models\Play\Power::class);
    }

    public function province()
    {
        return $this->belongsTo(\App\Models\Play\Province::class);
    }
}
