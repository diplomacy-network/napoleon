<?php

namespace App\Models\Play;

use App\Enums\Play\UnitTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
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
        'type',
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
        'type' => UnitTypeEnum::class,
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
